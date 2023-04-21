// Cookie Consent Functionality using session storage
window.onload = () => {
    setTimeout(() => {
        if (!sessionStorage.getItem("cookie_consent")) {
            document.getElementById("banner-top")?.classList.remove("fade");
            document.getElementById("banner-top")?.classList.remove("hidden");
        }
    }, 1000);
};

// sp menu starts

$(".menu-outer").click(function () {
    $("body").toggleClass("noscroll");
    $(".menu-area").toggleClass("open-inner");
    $(".navbar-brand").toggleClass("hide");
    $(this).toggleClass("open");
});

const navbarMenus = document.querySelectorAll('.navbar-menus');
const menuOuter = document.querySelector(".menu-outer");

navbarMenus.forEach((element) => {
    element.addEventListener('click', function () {
        menuOuter.click();
    })
})

// Cookie concent button functionality
document.getElementById("agree")?.addEventListener("click", function () {
    document?.getElementById("banner-top").classList.add("fade");
    document?.getElementById("banner-top").classList.add("hidden");
    sessionStorage.setItem("cookie_consent", true);
});

const pageType = document.querySelector("#page_type");
const parentPage = document.querySelector("#parent_page");
const edit = document.querySelectorAll("#edit");
const confirmBtn = document.querySelector("#confirm");
const contactField = document.querySelectorAll(".contact_field");
const contactLabel = document.querySelectorAll(".contact_label");
const submit = document.querySelector("#submit");
const back = document.querySelector("#back");
const withdrawalAmount = document.querySelector("#withdrawal-amount");
const totalWithdrawalAmount = document.querySelector(
    "#total-withdrawal-amount"
);
const transferFees = document.querySelector("#transfer-fees");
const submitWithdrawalRequest = document.querySelector(
    "#submit-withdrawal-request"
);
const quantity = document.querySelector("#quantity");
const hiddenQuantity = document.querySelector("#hidden-quantity");
const totalPrice = document.querySelector("#totalPrice");
const pricePerItem = document.querySelector("#pricePerItem");

//Tiny MCE Integration
var tinymce;
tinymce?.init({
    selector: "#content",
    plugins: "importcss, code, image",
    toolbar:
        "undo redo | formatpainter casechange blocks | bold italic backcolor | " +
        "alignleft aligncenter alignright alignjustify | " +
        "bullist numlist checklist outdent indent | removeformat | code | image",
    content_css: '{{url("assets/css/style.css")}}',
    image_list: [
        {
            title: "My image 1",
            value: '{{ url("storage/uploads/2022/Sep/6316fde28ed4f.png")}}',
        },
    ],
});

// Adding pages dynamically functionality by admin
pageType?.addEventListener("change", function () {
    if (pageType.value == "child") {
        parentPage.classList.remove("hide");
    } else {
        parentPage.classList.add("hide");
    }
});

// Edit bank details functionality
edit?.forEach((element) => {
    element?.addEventListener("click", function () {
        // element.classList.add("hide");
        // element.nextElementSibling.classList.add("hide");
        // element.previousElementSibling.removeAttribute("disabled");
        element.classList.add("green");
        var label = element.previousElementSibling;
        label.classList.remove("hide");
        var inputField = label.previousElementSibling;
        inputField.classList.add("hide");
    });
});

// Contact form confirm and edit functionality
confirmBtn?.addEventListener("click", function () {
    contactField.forEach((element) => {
        element.classList.add("hide");
        var labels = element.nextElementSibling;
        labels.innerHTML = element.value;
    });
    contactLabel.forEach((element) => {
        element.classList.remove("hide");
    });
    confirmBtn.classList.add("hide");
    submit.classList.remove("hide");
    back.classList.remove("hide");
});

back?.addEventListener("click", function () {
    contactField.forEach((element) => {
        element.classList.remove("hide");
    });
    contactLabel.forEach((element) => {
        element.classList.add("hide");
    });
    confirmBtn.classList.remove("hide");
    submit.classList.add("hide");
    back.classList.add("hide");
});

// Submit withdrawal request
const selectedCurrency = document.querySelector("#exampleFormControlSelect1");
withdrawalAmount?.addEventListener("keyup", function () {
    if (parseFloat(withdrawalAmount.value) > 0) {
        if (selectedCurrency.value != "JPY") {
            totalWithdrawalAmount.innerHTML =
                " " +
                parseFloat(
                    parseFloat(withdrawalAmount.value) +
                    parseFloat(transferFees.innerHTML)
                )
                    .toFixed(2)
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",") +
                " ";
                submitWithdrawalRequest.removeAttribute("disabled");
                submitWithdrawalRequest.classList.remove("disabled");
        } else {
            totalWithdrawalAmount.innerHTML =
                " " +
                (
                    parseInt(withdrawalAmount.value) +
                    parseInt(transferFees.innerHTML)
                )
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",") +
                " ";
            submitWithdrawalRequest?.removeAttribute("disabled");
            submitWithdrawalRequest.classList.remove("disabled");
        }
    } else {
        totalWithdrawalAmount.innerHTML = " 0 ";
        submitWithdrawalRequest.setAttribute("disabled", true);
        submitWithdrawalRequest.classList.add("disabled");
    }
});

// Buy-item Page increase & decrease button

const value = document.querySelector(".value");
var valueOfPurchase = document.querySelector("#value");
const btns = document.querySelectorAll(".btn");
const currentCurrency = document.querySelector("#exampleFormControlSelect1");

let num = value?.value;

value?.addEventListener("keyup", function () {
    num = value.value;
    valueOfPurchase.innerHTML = num + " M";
    hiddenQuantity.value = num;
    value.value = num;
    totalPrice.innerText = num * parseFloat(pricePerItem.value);
});

btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        const styles = e.currentTarget.classList;
        if (styles.contains("decrease")) {
            num--;
            valueOfPurchase.innerHTML = num + " M";
            hiddenQuantity.value = num;
            value.value = num;
            if (currentCurrency.value == "JPY") {
                totalPrice.innerText = parseFloat(
                    num * parseFloat(pricePerItem.value)
                ).toFixed(0);
            } else {
                totalPrice.innerText = parseFloat(
                    num * parseFloat(pricePerItem.value)
                ).toFixed(2);
            }
        } else if (styles.contains("increase")) {
            num++;
            valueOfPurchase.innerHTML = num + " M";
            hiddenQuantity.value = num;
            value.value = num;
            if (currentCurrency.value == "JPY") {
                totalPrice.innerText = parseFloat(
                    num * parseFloat(pricePerItem.value)
                ).toFixed(0);
            } else {
                totalPrice.innerText = parseFloat(
                    num * parseFloat(pricePerItem.value)
                ).toFixed(2);
            }
        } else {
            num = 0;
        }
        // styling the color on values
        // value.textContent = num;
        value.value = num;
        if (num > 0) {
            value.style.color = "#7e7e7e";
        } else if (num < 0) {
            value.style.color = "red";
            totalPrice.innerText = "0";
            valueOfPurchase.innerHTML = "0 M";
        } else {
            value.style.color = "#7e7e7e";
        }
    });
});

//Range for Item Page

(function () {
    var parent = document.querySelector("#rangeSlider");
    if (!parent) return;

    var rangeS = parent.querySelectorAll("input[type=range]"),
        numberS = parent.querySelectorAll(".number-input");

    rangeS.forEach(function (el) {
        el.oninput = function () {
            var slide1 = parseFloat(rangeS[0].value),
                slide2 = parseFloat(rangeS[1].value);

            if (slide1 > slide2) {
                [slide1, slide2] = [slide2, slide1];
            }

            numberS[0].value = slide1;
            numberS[1].value = slide2;
        };
    });

    numberS.forEach(function (el) {
        el.oninput = function () {
            var number1 = parseFloat(numberS[0].value),
                number2 = parseFloat(numberS[1].value);

            if (number1 > number2) {
                var tmp = number1;
                numberS[0].value = number2;
                numberS[1].value = tmp;
            }

            rangeS[0].value = number1;
            rangeS[1].value = number2;
        };
    });
    $("input.format-with-comma").on("keyup", function () {
        updateTextView($(this));
    });

    $("input[type=range]").on("input", function () {
        $(".number-group .number-input").each(function (k, field) {
            updateTextView($(field));
        });
    });
})();

function updateTextView(_obj) {
    var num = getNumber(_obj.val());
    if (num == 0) {
        _obj.val("");
    } else {
        _obj.val(num.toLocaleString());
    }
}
function getNumber(_str) {
    var arr = _str.split("");
    var out = new Array();
    for (var cnt = 0; cnt < arr.length; cnt++) {
        if (isNaN(arr[cnt]) == false) {
            out.push(arr[cnt]);
        }
    }
    return Number(out.join(""));
}

// Adding other device in the devices table
const otherDevice = document.querySelector("#exampleFormControlSelect2");
const otherDeviceInput = document.querySelector("#otherDeviceInput");

otherDevice?.addEventListener("change", function () {
    if (otherDevice.value == "other") {
        otherDeviceInput.classList.remove("hide");
    } else {
        otherDeviceInput.classList.add("hide");
    }
});

// Adding other device in the devices table
const otherCategory = document.querySelector("#exampleFormControlSelect3");
const otherCategoryInput = document.querySelector("#otherCategoryInput");

otherCategory?.addEventListener("change", function () {
    if (otherCategory.value == "other") {
        otherCategoryInput.classList.remove("hide");
    } else {
        otherCategoryInput.classList.add("hide");
    }
});

// Adding other category in add pages ( ADMIN )
const otherHeading = document.querySelector("#category");
otherHeading?.addEventListener("change", function () {
    if (otherHeading.value == "other") {
        otherDeviceInput.classList.remove("hide");
    } else {
        otherDeviceInput.classList.add("hide");
    }
});

// functionality to copy the transaction id in purchased products details
const copyBtn = document.querySelector("#copyBtn");
const transactionId = document.querySelector("#transactionId");
const copied = document.querySelector("#copied");

copyBtn?.addEventListener("click", function () {
    const el = document.createElement("textarea");
    el.value = transactionId.innerHTML;
    document.body.appendChild(el);
    el.select();
    document.execCommand("copy");
    document.body.removeChild(el);

    copied.classList.remove("hide");
    setTimeout(function () {
        copied.classList.add("hide");
    }, 500);
});

// Searching in profile page
const search = document.querySelector("#profile-page-search");
const form = document.querySelector("#profile-page-form");

search?.addEventListener("keyup", function () {
    form.submit();
});

// functionality for star rating after purchase is successfull
const ratingStar = document.querySelectorAll(".rating-star");
const ratingCount = document.querySelector(".rating-count");
const ratingCountHidden = document.querySelector(".rating-count-hidden");

ratingStar.forEach((star, clickedIndex) => {
    star.addEventListener("click", function () {
        ratingStar.forEach((otherStar, otherIndex) => {
            if (otherIndex <= clickedIndex) {
                otherStar.setAttribute(
                    "src",
                    "http://localhost:8000/assets/images/rating-golden.svg"
                );
                ratingCount.value = clickedIndex + 1;
                ratingCountHidden.value = clickedIndex + 1;
            } else {
                otherStar.setAttribute(
                    "src",
                    "http://localhost:8000/assets/images/rating-gray.svg"
                );
            }
        });
    });
});

// Functionality to change felis bank account while product purchasing
const changeBankSelect = document.querySelector(".changeBankSelect");
const changeBankForm = document.querySelector("#changeBankForm");

changeBankSelect?.addEventListener("change", function () {
    changeBankForm.submit();
});

// For image preview during uploading profile picture
const uploadProfilePic = document.querySelector(".upload-profile-pic");
const inputProfilePic = document.querySelector("#inputProfilePic");
const removeProfilePic = document.querySelector(".remove-profile-pic");
const deleteBtnClickListener = document.querySelector(".delete-btn-click-listener");

uploadProfilePic?.addEventListener("click", function () {
    inputProfilePic.click();
});

inputProfilePic?.addEventListener("change", function (e) {
    let preview = URL.createObjectURL(e.target.files[0]);
    uploadProfilePic.src = preview;
    deleteBtnClickListener.checked = false;
});

removeProfilePic?.addEventListener("click", function () {
    inputProfilePic.value = null;
    let preview =
        window.location.origin + "/assets/images/default-profile-mypage.png";
    uploadProfilePic.src = preview;
    deleteBtnClickListener.checked = true;
});

const imageUploadNew = document.querySelector("#image-upload-new");
const imageSelectDivNew = document.querySelector(".image-select-div-new");
const imagePreviewNew = document.querySelector(".image-preview-new");
const imageUploadPreviewNew = document.querySelector(".image-upload-preview-new");
const removeUploadedPicNew = document.querySelector(".remove-uploaded-pic-new");


imageUploadNew?.addEventListener("change", function(e){
    imageSelectDivNew.classList.add("hide");
    imagePreviewNew.classList.remove("hide");
    let preview = URL.createObjectURL(e.target.files[0]);
    imageUploadPreviewNew.src = preview;
    deleteBtnClickListener.checked = false;
});

removeUploadedPicNew?.addEventListener("click", function(){
    imageSelectDivNew.classList.remove("hide");
    imagePreviewNew.classList.add("hide");
    imageUploadNew.value = null;
    deleteBtnClickListener.checked = true;
});

// For image preview during adding adding games and products
const imageSelectDiv = document.querySelector(".image-select-div");
const imagePreviewDiv = document.querySelector(".image-preview-div");
const imageUpload = document.querySelector("#image-upload");
const deleteImageUpload = document.querySelector("#delete-image-upload");
const imageUploadPreview = document.querySelector("#image-upload-preview");
const removeUploadedPic = document.querySelector(".remove-uploaded-pic");

const document1delete = document.querySelector(".document-1-delete");
const document2delete = document.querySelector(".document-2-delete");
const document3delete = document.querySelector(".document-3-delete");

imageUpload?.addEventListener("change", function (e) {
    imageSelectDiv.classList.add("hide");
    imagePreviewDiv.classList.remove("hide");
    let preview = URL.createObjectURL(e.target.files[0]);
    imageUploadPreview.src = preview;
    document1delete.checked = false;
});

removeUploadedPic?.addEventListener("click", function () {
    imageUpload.value = null;
    imageSelectDiv.classList.remove("hide");
    imagePreviewDiv.classList.add("hide");
    document1delete.checked = true;
    deleteImageUpload.src =
        window.location.origin + "/assets/images/default-game.png";
});

const imageSelectDiv2 = document.querySelector(".image-select-div2");
const imagePreviewDiv2 = document.querySelector(".image-preview-div2");
const imageUpload2 = document.querySelector("#image-upload2");
const deleteImageUpload2 = document.querySelector("#delete-image-upload2");
const imageUploadPreview2 = document.querySelector("#image-upload-preview2");
const removeUploadedPic2 = document.querySelector(".remove-uploaded-pic2");

imageUpload2?.addEventListener("change", function (e) {
    imageSelectDiv2.classList.add("hide");
    imagePreviewDiv2.classList.remove("hide");
    let preview2 = URL.createObjectURL(e.target.files[0]);
    imageUploadPreview2.src = preview2;
    document2delete.checked = false;
});

removeUploadedPic2?.addEventListener("click", function () {
    imageUpload2.value = null;
    imageSelectDiv2.classList.remove("hide");
    imagePreviewDiv2.classList.add("hide");
    document2delete.checked = true;
    deleteImageUpload2.src =
        window.location.origin + "/assets/images/default-game.png";
});

const imageSelectDiv3 = document.querySelector(".image-select-div3");
const imagePreviewDiv3 = document.querySelector(".image-preview-div3");
const imageUpload3 = document.querySelector("#image-upload3");
const deleteImageUpload3 = document.querySelector("#delete-image-upload3");
const imageUploadPreview3 = document.querySelector("#image-upload-preview3");
const removeUploadedPic3 = document.querySelector(".remove-uploaded-pic3");

imageUpload3?.addEventListener("change", function (e) {
    imageSelectDiv3.classList.add("hide");
    imagePreviewDiv3.classList.remove("hide");
    let preview3 = URL.createObjectURL(e.target.files[0]);
    imageUploadPreview3.src = preview3;
    document3delete.checked = false;
});

removeUploadedPic3?.addEventListener("click", function () {
    imageUpload3.value = null;
    imageSelectDiv3.classList.remove("hide");
    imagePreviewDiv3.classList.add("hide");
    document3delete.checked = true;
    deleteImageUpload3.src =
        window.location.origin + "/assets/images/default-game.png";
});

// functionality to dynamically choose the type of document for ID Verification in my page
const radio1 = document.querySelector("#radio1");
const radio2 = document.querySelector("#radio2");
const radio3 = document.querySelector("#radio3");
const radio1Label = document.querySelector("#radio1-label");
const radio2Label = document.querySelector("#radio2-label");
const radio3Label = document.querySelector("#radio3-label");
const radio1Border = document.querySelector("#radio1-border");
const radio2Border = document.querySelector("#radio2-border");
const radio3Border = document.querySelector("#radio3-border");
const documentType = document.querySelector("#document_type");
const secondDocument = document.querySelector("#second-document");

radio1?.addEventListener("click", function () {
    radio1Label.classList.add("active", "lbl");
    radio2Label.classList.remove("active", "lbl");
    // radio3Label.classList.remove("active", "lbl");
    radio1Border.classList.remove("opacity");
    radio1Border.firstElementChild.classList.add("active");
    radio2Border.classList.add("opacity");
    radio2Border.firstElementChild.classList.remove("active");
    // radio3Border.classList.add("opacity");
    // radio3Border.firstElementChild.classList.remove("active");
    documentType.value = "passport";
    secondDocument?.classList.add("hide");
});

radio2?.addEventListener("click", function () {
    radio1Label.classList.remove("active", "lbl");
    radio2Label.classList.add("active", "lbl");
    // radio3Label.classList.remove("active", "lbl");
    radio1Border.classList.add("opacity");
    radio1Border.firstElementChild.classList.remove("active");
    radio2Border.classList.remove("opacity");
    radio2Border.firstElementChild.classList.add("active");
    // radio3Border.classList.add("opacity");
    // radio3Border.firstElementChild.classList.remove("active");
    documentType.value = "driving_license";
    secondDocument?.classList.remove("hide");
});


const idTypePassport = document.querySelector(".id-select-passport-div");
const idTypeDrivingLicense = document.querySelector(".id-select-driving-license-div");
const passportIconDiv = document.querySelector(".passport-icon-div");
const licenseIconDiv = document.querySelector(".license-icon-div");

idTypePassport?.addEventListener("click", function(){
    documentType.value = "passport";
    idTypePassport.firstElementChild.classList.add("active-document-border");
    idTypeDrivingLicense.firstElementChild.classList.remove("active-document-border");
    passportIconDiv.firstElementChild.classList.add("active");
    licenseIconDiv.firstElementChild.classList.remove("active");
    secondDocument?.classList.add("hide");
});
idTypeDrivingLicense?.addEventListener("click", function(){
    documentType.value = "driving_license";
    idTypeDrivingLicense.firstElementChild.classList.add("active-document-border");
    idTypePassport.firstElementChild.classList.remove("active-document-border");
    passportIconDiv.firstElementChild.classList.remove("active");
    licenseIconDiv.firstElementChild.classList.add("active");
    secondDocument?.classList.remove("hide");
});

// radio3?.addEventListener("click", function () {
//     radio1Label.classList.remove("active", "lbl");
//     radio2Label.classList.remove("active", "lbl");
//     radio3Label.classList.add("active", "lbl");
//     radio1Border.classList.add("opacity");
//     radio1Border.firstElementChild.classList.remove("active");
//     radio2Border.classList.add("opacity");
//     radio2Border.firstElementChild.classList.remove("active");
//     radio3Border.classList.remove("opacity");
//     radio3Border.firstElementChild.classList.add("active");
//     documentType.value = "other";
//     secondDocument?.classList.add("hide");
// });

// Price filter functionality in view products page
const priceFiltersForm = document.querySelector("#price-filters-form");
const searchFilterBtn = document.querySelector("#search-filter-btn");

searchFilterBtn?.addEventListener("click", function () {
    priceFiltersForm.submit();
});

// Favorite starts

$(".red-heart").mouseenter(function () {
    $(".heart-1").removeClass("d-none");
    $(".heart-2").addClass("d-none");
});

$(".red-heart").mouseleave(function () {
    $(".heart-1").addClass("d-none");
    $(".heart-2").removeClass("d-none");
});

// Platform change filter in view products page
$(".change_platform").on("change", function (e) {
    e.preventDefault();
    var game_id = $(".change_platform").val();

    window.location.href = window.location.origin + "/game/" + game_id;
});

// Bottom menu starts

var flag;
$(".bottom-a").click(function () {
    if (!flag) {
        $(".dropdown-bottom").removeClass("d-none");
        flag = true;
    } else {
        $(".dropdown-bottom").addClass("d-none");
        flag = false;
    }
});

$(function () {
    //  Autocomplete Prediction ends
    var path = "/autocomplete-search";
    $("#user_game_name").typeahead({
        source: function (query, process) {
            return $.get(
                path,
                {
                    query: query,
                },
                function (data) {
                    return process(data);
                }
            );
        },
        updater: function (game) {
            location.href = "/game/" + game.id;
        },
    });

    $("#dashboard_game_name").typeahead({
        source: function (query, process) {
            return $.get(
                path,
                {
                    query: query,
                },
                function (data) {
                    return process(data);
                }
            );
        },
        updater: function (game) {
            location.href = "/game/" + game.id;
        },
    });

    if ($("#user_search").length) {
        var userSearchPath = "/autocomplete-search-users";
        var input = document.querySelector("#user_search"),
            tagify = new Tagify(input, { whitelist: [] }),
            controller; // for aborting the call

        tagify.on("input", onInput);

        function onInput(e) {
            var value = e.detail.value;
            tagify.whitelist = null; // reset the whitelist

            controller && controller.abort();
            controller = new AbortController();

            tagify.loading(true).dropdown.hide();

            fetch(userSearchPath + "?query=" + value, {
                signal: controller.signal,
            })
                .then((RES) => RES.json())
                .then(function (data) {
                    data = data.map(function (ele) {
                        return {
                            id: ele.id,
                            value:
                                ele.first_name +
                                " " +
                                ele.last_name +
                                " (" +
                                ele.display_name +
                                ")",
                        };
                    });
                    tagify.whitelist = data; // update whitelist Array in-place
                    tagify.loading(false).dropdown.show(value); // render the suggestions dropdown
                });
        }

        tagify.on("change", function () {
            if (
                $("#user_search").val() != "" &&
                JSON.parse($("#user_search").val())
                    .map((data) => {
                        return data.id;
                    })
                    .toString() != ""
            ) {
                var selectedUser = JSON.parse($("#user_search").val())
                    .map((data) => {
                        return data.id;
                    })
                    .toString();
                $("#selected_users").val(selectedUser);
            }
        });
    }

    $(".user_radio").click(function () {
        if ($(".user_radio:checked").val() == "all") {
            $("#user-selection").addClass("hide");
        } else {
            $("#user-selection").removeClass("hide");
        }
    });
});

const japaneseAccountType = document.querySelector(".japanese_account_type");
const englishAccountType = document.querySelector(".english_account_type");

japaneseAccountType?.addEventListener("change", function () {
    englishAccountType.value = japaneseAccountType.value;
});

// Fixing z-index on dashboard clash due to animation

const searchTerm = document.querySelector(".searchTerm");
const dropDown = document.querySelector(".dropdown-menu");
const navLinks = document.querySelectorAll(".nav-link");
const topImage = document.querySelectorAll(".zoom");

searchTerm?.addEventListener("focus", function () {
    navLinks.forEach((e) => {
        e.style.zIndex = 0;
    });
    topImage.forEach((f) => {
        f.style.zIndex = 0;
    });
});

searchTerm?.addEventListener("blur", function () {
    navLinks.forEach((e) => {
        e.style.zIndex = 9999;
    });
    topImage.forEach((f) => {
        f.style.zIndex = 99999;
    });
});

// Withdraw request modal form submit
const withdrawRequestButton = document.querySelector(
    "#withdraw-modal-button-2"
);
const withdrawRequestForm = document.querySelector("#withdraw-request-form");

withdrawRequestButton?.addEventListener("click", function () {
    withdrawRequestForm.submit();
});

// Function for typeahead used for bank name from JSON file
$(function () {
    // function fetchData() {
    fetch("../assets/data/jsonData.json")
        .then((res) => res.json())
        .then((data) => {
            var productNames = new Array();
            var productIds = new Object();
            $.each(data, function (index, product) {
                if (product != null) {
                    productNames.push(product.name + "  (" + product.id + ")");
                    productIds[product.name] = product.id;
                }
            });
            $(".bank_name").typeahead({
                source: productNames,
            });
        });
    // }

    // fetchData();
});

// HomePage hover images
// Carousel 1
const carouselOneHoverDiv = document.querySelector(".carousel-1-hover-div");
const carouselOneHoverImage = document.querySelector(".carousel-1-hover-image");
const carouselOneImages = document.querySelectorAll(".carousel-1-images");

carouselOneImages?.forEach((element) => {
    element?.addEventListener("mouseenter", function () {
        carouselOneHoverDiv?.classList.remove("hide");
        carouselOneHoverImage.src = element.src;
    });

    element?.addEventListener("mouseleave", function () {
        carouselOneHoverDiv?.classList.add("hide");
    });
});

// Carousel 2
const carouselTwoHoverDiv = document.querySelector(".carousel-2-hover-div");
const carouselTwoHoverImage = document.querySelector(".carousel-2-hover-image");
const carouselTwoImages = document.querySelectorAll(".carousel-2-images");

carouselTwoImages?.forEach((element) => {
    element?.addEventListener("mouseenter", function () {
        carouselTwoHoverDiv?.classList.remove("hide");
        carouselTwoHoverImage.src = element.src;
    });

    element?.addEventListener("mouseleave", function () {
        carouselTwoHoverDiv?.classList.add("hide");
    });
});

// Carousel 3
const carouselThreeHoverDiv = document.querySelector(".carousel-3-hover-div");
const carouselThreeHoverImage = document.querySelector(".carousel-3-hover-image");
const carouselThreeImages = document.querySelectorAll(".carousel-3-images");

carouselThreeImages?.forEach((element) => {
    element?.addEventListener("mouseenter", function () {
        carouselThreeHoverDiv?.classList.remove("hide");
        carouselThreeHoverImage.src = element.src;
    });

    element?.addEventListener("mouseleave", function () {
        carouselThreeHoverDiv?.classList.add("hide");
    });
});

// Carousel 4
const carouselFourHoverDiv = document.querySelector(".carousel-4-hover-div");
const carouselFourHoverImage = document.querySelector(".carousel-4-hover-image");
const carouselFourImages = document.querySelectorAll(".carousel-4-images");

carouselFourImages?.forEach((element) => {
    element?.addEventListener("mouseenter", function () {
        carouselFourHoverDiv?.classList.remove("hide");
        carouselFourHoverImage.src = element.src;
    });

    element?.addEventListener("mouseleave", function () {
        carouselFourHoverDiv?.classList.add("hide");
    });
});

// Carousel 5
const carouselFiveHoverDiv = document.querySelector(".carousel-5-hover-div");
const carouselFiveHoverImage = document.querySelector(".carousel-5-hover-image");
const carouselFiveImages = document.querySelectorAll(".carousel-5-images");

carouselFiveImages?.forEach((element) => {
    element?.addEventListener("mouseenter", function () {
        carouselFiveHoverDiv?.classList.remove("hide");
        carouselFiveHoverImage.src = element.src;
    });

    element?.addEventListener("mouseleave", function () {
        carouselFiveHoverDiv?.classList.add("hide");
    });
});

// Carousel 6
const carouselSixHoverDiv = document.querySelector(".carousel-6-hover-div");
const carouselSixHoverImage = document.querySelector(".carousel-6-hover-image");
const carouselSixImages = document.querySelectorAll(".carousel-6-images");

carouselSixImages?.forEach((element) => {
    element?.addEventListener("mouseenter", function () {
        carouselSixHoverDiv?.classList.remove("hide");
        carouselSixHoverImage.src = element.src;
    });

    element?.addEventListener("mouseleave", function () {
        carouselSixHoverDiv?.classList.add("hide");
    });
});

// Carousel 7
const carouselSevenHoverDiv = document.querySelector(".carousel-7-hover-div");
const carouselSevenHoverImage = document.querySelector(".carousel-7-hover-image");
const carouselSevenImages = document.querySelectorAll(".carousel-7-images");

carouselSevenImages?.forEach((element) => {
    element?.addEventListener("mouseenter", function () {
        carouselSevenHoverDiv?.classList.remove("hide");
        carouselSevenHoverImage.src = element.src;
    });

    element?.addEventListener("mouseleave", function () {
        carouselSevenHoverDiv?.classList.add("hide");
    });
});

// Dashboard Fixed Navbar

const navbarTop = document.querySelector(".navbarTopMain");
const navItem = document.querySelectorAll(".nav-link-dashboard");
const wicons = document.querySelectorAll(".white-icon");
const bicons = document.querySelectorAll(".black-icon");
const afterScrollBtn1 = document.querySelector(".after-scroll-btn-1");
const afterScrollBtn2 = document.querySelector(".after-scroll-btn-2");


window.addEventListener("scroll", function () {
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        navbarTop?.classList.remove("position-absolute");
        navbarTop?.classList.add("position-fixed");
        navbarTop?.classList.add("bg-lgreen");
        navbarTop?.classList.add("shadow-header");
        navbarTop?.classList.add("pad-0");
        navbarTop?.classList.remove("pad-y1");
        navItem.forEach((element) => {
            element.classList.add("txt-blk");
        });
        wicons.forEach(e => {
            e.classList.add("hide");
        });
        bicons.forEach(f => {
            f.classList.remove("hide");
        });
        afterScrollBtn1?.classList.remove("signin", "view-2");
        afterScrollBtn1?.classList.add("view", "sell");
        afterScrollBtn2?.classList.remove("view");
        afterScrollBtn2?.classList.add("view-2");
    } else {
        navbarTop?.classList.add("position-absolute");
        navbarTop?.classList.remove("position-fixed");
        navbarTop?.classList.remove("bg-lgreen");
        navbarTop?.classList.remove("shadow-header");
        navbarTop?.classList.remove("pad-0");
        navbarTop?.classList.add("pad-y1");
        navItem.forEach((element) => {
            element.classList.remove("txt-blk");
        });
        wicons.forEach(e => {
            e.classList.remove("hide");
        });
        bicons.forEach(f => {
            f.classList.add("hide");
        });
        afterScrollBtn1?.classList.add("signin");
        afterScrollBtn1?.classList.remove("view", "sell");
        afterScrollBtn2?.classList.add("view");
        afterScrollBtn2?.classList.remove("view-2");
    }
});


const contactFormCommonClass = document.querySelectorAll(".contact-form-common-class");
const contactConfirmButton = document.querySelector(".contact-confirm-button");
const formFirstName = document.querySelector(".form-first-name");
const formLastName = document.querySelector(".form-last-name");
const formEmail = document.querySelector(".form-email");
const formInquiry = document.querySelector(".form-inquiry");
contactFormCommonClass.forEach((e) => {
    e.addEventListener("keyup", function(){
        if(formFirstName.value != "" && formLastName.value != "" && formEmail.value != "" && formInquiry.value != ""){
            contactConfirmButton.classList.remove("disabled");
            contactConfirmButton.removeAttribute("disabled");
        }
    });
});


// Ambalika's JS start
// select show all by default in popular collections tab menu
function viewCollections(elmnt) {
    var i, tabcontent;
    tabcontent = document.getElementsByClassName("tablinks");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove('isActive');;
    }
    elmnt.classList.add("isActive");
}
// Get the element with id="defaultOpen" and click on it
//   document.getElementById("defaultOpen").click();

$('.slider')?.slick({
    infinite: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 3,
    variableWidth: true,
    nextArrow: '<span class="next-arrow"><i class="fa-solid fa-angle-right"></i></span>',
    prevArrow: '<span class="prev-arrow"><i class="fa-solid fa-angle-left"></i></span>',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

var isMenuOpen = false;
function menuToggle() {
    const hamburger = document.getElementById("nav-button");
    const nav = document.getElementById("navbar-parent");
    const headerLeft = document.getElementById("header-left");
    const navbarNav = document.getElementById("navbar-nav-mobile");
    nav.classList.toggle('show');
    navbarNav.classList.toggle('d-flex');
    headerLeft.classList.toggle('flex-column');
    hamburger.classList.toggle('d-none');
    isMenuOpen = true;
}

const containerFluid = document.getElementById("container-fluid");
function removePaddingClass() {
    containerFluid?.classList.remove('px-5');
    containerFluid?.classList.remove('py-5');
}
function addPaddingClass() {
    containerFluid?.classList.add('px-5');
    containerFluid?.classList.add('py-5');
}
if ($(window).width() < 600) {
    removePaddingClass();
}

$(window).resize(function () {
    if ($(window).width() < 600) {
        removePaddingClass();
    } else {
        addPaddingClass();
    }
})

function closeMenu() {
    if (isMenuOpen === true) {
        menuToggle();
    }
    return;
}
// Ambalika's JS ends