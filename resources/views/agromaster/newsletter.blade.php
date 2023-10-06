<!--====== Newsletter Start ======-->
<section class="newsletter-area">
    <div class="container">
        <div class="newsletter-wrapper bg_cover" style="background-image: url({{asset('/images/newsletter-bg.jpg')}});">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="section-title-2 mt-5">
                        <h2 class="title">Зворотній зв'язок</h2>
                        <span class="line"></span>
                        <p>Ви можете задати запитання до адміністрації сайту</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="newsletter-form mt-5">
                        <form action="/newsletter" method="post">
                            @csrf
                            <input type="text" name="phone" placeholder="Ваш номер телефону або email">
                            <button class="main-btn main-btn-2">Відправити</button>
                            <input class="mt-3" type="text" name="message" placeholder="Ваше запитання">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Newsletter Ends ======-->

