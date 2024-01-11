<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style/content.css">
    <title>Document</title>
</head>

<body>
    <?php if (empty($this->session->userdata['email'])) { ?>

        <div class="container">
            <div class="row">

                <div class="col-md-4 mt-5">
                    <img src="/assets/img/homepage.jpg" alt="" width="467px">
                </div>

                <div class="col-md-8 mt-5">

                    <h4 style="margin-left: 80px; font-weight:600;">History of Care Bears (Care Bears) dolls from which country?</h4>
                    <p style="margin-left: 80px; font-size:20px;">
                        A website about all the Care Bears dolls. Captures the <br>
                        heartwarming moments of baby: sunlit naps, cuddles and <br>
                        story time. Featuring snuggly apparel, delightful essentials <br>
                        and developmental toys, Care Bears Baby will create magical <br>
                        memories for years to come.
                    </p>

                </div>

            </div>
        </div>

    <?php } else { ?>
        <div>
            <div class="container">
                <!-- ส่วนที่ 1 -->
                <div class="row">

                    <div class="col-md-1">
                        <img class="bear" src="/assets/img/b4.jpg" width="150px" alt="">
                    </div>
                    <div class="col-md-5">
                        <div class="care-bear">
                            <b>Bedtime Bear</b> <br>
                            <b>Meaning:</b> Wish you a good night. <br>
                            <b>Symbols on the abdomen:</b> crescent <br>
                            moon and star
                        </div>
                    </div>

                    <div class="col-md-1">
                        <img class="bear" src="/assets/img/b2.jpg" width="150px" alt="">
                    </div>
                    <div class="col-md-5">
                        <div class="care-bear">
                            <b>Good Luck Bear</b> <br>
                            <b>Meaning:</b> Good luck, success. <br>
                            <b>Symbols on the abdomen:</b> green clover leaf
                        </div>
                    </div>

                </div>
                <!-- จบส่วนที่ 1 -->
                <!-- ส่วนที่ 2 -->
                <div class="row">

                    <div class="col-md-1">
                        <img class="bear" src="/assets/img/b6.jpg" width="150px" alt="">
                    </div>
                    <div class="col-md-5">
                        <div class="care-bear">
                            <b>Funshine Bear</b> <br>
                            <b>Meaning:</b> Hilarious, cheerful, cheerful. <br>
                            <b>Symbols on the abdomen:</b> smiling sun
                        </div>
                    </div>

                    <div class="col-md-1">
                        <img class="bear" src="/assets/img/b5.jpg" width="150px" alt="">
                    </div>
                    <div class="col-md-5">
                        <div class="care-bear">
                            <b>Love A Lot Bear</b> <br>
                            <b>Meaning:</b> Will be there to support you. <br>
                            <b>Symbols on the abdomen:</b> Rainbow
                        </div>
                    </div>

                </div>
                <!-- จบส่วนที่ 2 -->
                <!-- ส่วนที่ 3 -->
                <div class="row">

                    <div class="col-md-1">
                        <img class="bear" src="/assets/img/b7.jpg" width="150px" alt="">
                    </div>
                    <div class="col-md-5">
                        <div class="care-bear">
                            <b>Wish Bear</b> <br>
                            <b>Meaning:</b> May your wishes come true. <br>
                            <b>Symbols on the abdomen:</b> rain cloud <br>
                            picture
                        </div>
                    </div>

                    <div class="col-md-1">
                        <img class="bear" src="/assets/img/b1.jpg" width="150px" alt="">
                    </div>
                    <div class="col-md-5">
                        <div class="care-bear">
                            <b>Tenderheart Bear</b> <br>
                            <b>Meaning:</b> Have leadership. <br>
                            <b>Symbols on the abdomen:</b> heart shape
                        </div>
                    </div>

                </div>
                <!-- จบส่วนที่ 3 -->

                <!-- เพิ่มเติม -->
                <script src="https://cdn.jsdelivr.net/npm/slice-html@latest"></script>

                <div class="see-more" style="margin-left: 407px; margin-top:50px;">
                    <div class="row" style="margin-left: -407px; margin-top:-50px;">
                        <div class="col-md-1">
                            <img class="bear-see-1" src="/assets/img/b3.jpg" width="150px" alt="">
                        </div>
                        <div class="col-md-5">
                            <div class="care-bear-see-1">
                                <b>Cheer Bear</b> <br>
                                <b>Meaning:</b> May your wishes come true. <br>
                                <b>Symbols on the abdomen:</b> rain cloud <br>
                                picture
                            </div>
                        </div>

                        <div class="col-md-1">
                            <img class="bear-see-2" src="/assets/img/b8.jpg" width="150px" alt="">
                        </div>
                        <div class="col-md-5">
                            <div class="care-bear-see-2">
                                <b>Grumpy Bear</b> <br>
                                <b>Meaning:</b> encouragement.  <br>
                                <b>Symbols on the abdomen:</b>  rain cloud
                                picture 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn">
                <script>
                    (() => {
                        const readMorePrefaceMaxLength = 0;

                        const readMoreTexts = document.querySelectorAll(".see-more");

                        readMoreTexts.forEach((readMoreText) => {
                            const extra = SliceHTML.sliceHTML(
                                readMoreText,
                                readMorePrefaceMaxLength
                            );

                            if (extra.textContent.length === 100) {
                                return;
                            }

                            const preface = SliceHTML.sliceHTML(
                                readMoreText,
                                0,
                                readMorePrefaceMaxLength
                            );

                            readMoreText.innerHTML = "";
                            readMoreText.append(preface);

                            const extraSpan = document.createElement("span");

                            extraSpan.hidden = true;
                            extraSpan.append(extra);

                            const button = document.createElement("button");

                            button.style.border = "none";
                            button.style.textDecoration = "underline";
                            button.style.color = "blue";
                            button.style.fontSize = "20px";
                            button.style.background = "white";
                            button.classList.add("see-more");
                            button.textContent = "See more";

                            button.addEventListener("click", () => {
                                button.hidden = true;
                                extraSpan.hidden = false;
                            });

                            readMoreText.append(button);
                            readMoreText.append(extraSpan);
                        });
                    })();
                </script>
            </button>
        </div>
        </div>
    <?php } ?>
</body>
</html>