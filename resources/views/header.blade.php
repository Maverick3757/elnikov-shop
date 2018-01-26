<header>
    <div class="h-top">
        <div class="wrap">
            <div class="header-top">
                <div class="logo">
                    <img src="{{url('css/img/logBdl.png')}}" alt="" class="logo-img">
                </div>
                <div class="user">
                    <button class="user-btn reg">Регистраця</button>
                    <button class="user-btn auth">Вход</button>
                    <button class="user-btn cab hidden">личный кабинет</button>
                    <button class="user-btn hidden out">Выход</button>
                </div>
                <div class="cart">
                    <button class="cart-btn">
                        <span class="cart-count">0</span>
                    </button>
                    <div class="cart-info">
                        <div class="cart-hidden">
                            <button class="cart-close">✖</button>
                        </div>
                        <span class=""></span>
                        <ul class="cart-list">
                            <li class="cart-item">
                                <img src="img/item1.png" alt="" class="cart-item_img">
                                <h6 class="cart-item_name"><a href="#" class="cart-item_link">Динамометрический ключ Fiat Doblo ANAM0803</a></h6>
                                <div class="cart-item_price">725 грн</div>
                                <div class="cart-item_counter">
                                    <button class="cart-item_add">+</button>
                                    <span class="cart-item_count">0</span>
                                    <button class="cart-item_join">-</button>
                                </div>
                                <div class="cart-item_all-price">123 грн</div>
                                <button class="cart-item_remove">✖</button>
                            </li>
                        </ul>
                        <div class="cart-panel">
                            <button class="cart-panel_clear">Очистить</button>
                            <button class="cart-panel_add">Оформить заказ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-center">
        <div class="wrap">
            <div class="forms">
                <div class="order">
                    <div class="order-hidden">
                        <button class="order-close">✖</button>
                    </div>
                    <ul class="cart-list">
                        <li class="cart-item">
                            <img src="img/item1.png" alt="" class="cart-item_img">
                            <h6 class="cart-item_name"><a href="#" class="cart-item_link">Динамометрический ключ Fiat Doblo ANAM0803</a></h6>
                            <div class="cart-item_price">725 грн</div>
                            <div class="cart-item_counter">
                                <button class="cart-item_add">+</button>
                                <span class="cart-item_count">0</span>
                                <button class="cart-item_join">-</button>
                            </div>
                            <div class="cart-item_all-price">123 грн</div>
                            <button class="cart-item_remove">✖</button>
                        </li>
                    </ul>
                    <div class="order-total">
                        <span class="order-total_text">Всего товаров:</span>
                        <span class="order-total_count">3</span>
                        <span class="order-total_text">Сумма:</span>
                        <span class="order-total_count">20193 грн</span>
                    </div>
                    <form action="" method="post" class="order-form">
                        <input type="text" name="name" class="order-form_input" placeholder="Имя...">
                        <input type="tel" name="phone" class="order-form_input" placeholder="Номер телефона...">
                        <input type="email" name="email" class="order-form_input" placeholder="Email(для отслеживания статуса заказа)...">
                        <button class="order-form_btn">оформить</button>
                    </form>
                </div>
                <div class="order-messege">
                    <div class="messege-content">
                        <span class="messege-content_text">Ваш заказ оформлен!</span>
                        <span class="messege-content_text">Для подтверждения мы свяжемся с вами в ближайшее время</span>
                        <button class="messege-content_btn">ок</button>
                    </div>
                </div>
                <div class="register">
                    <div class="register-hidden">
                        <button class="register-close">✖</button>
                    </div>
                    <h4 class="register-title">
                        регистрация
                    </h4>
                    <form action="post" method="post" class="register-form">
                        <input type="text" name="name" class="register-form_input" placeholder="Имя">
                        <span class="register-form_error">
                        </span>
                        <input type="tel" name="name" class="register-form_input" placeholder="Номер телефона">
                        <span class="register-form_error">
                        </span>
                        <input type="email" name="name" class="register-form_input" placeholder="Email">
                        <input type="password" name="pass" class="register-form_input" placeholder="Пароль">
                        <span class="register-form_error">
                        </span>
                        <input type="password" name="pass_confir" class="register-form_input" placeholder="Пароль">
                        <span class="register-form_error">
                        </span>
                        <button class="register-form_btn">регистрация</button>
                    </form>
                </div>
                <div class="authorization" style="display: none;">
                    <div class="authorization-hidden">
                        <button class="authorization-close">✖</button>
                    </div>
                    <h4 class="authorization-title">
                        авторизация
                    </h4>
                    <form action="post" method="post" class="authorization-form">
                        <input type="tel" name="name" class="authorization-form_input" placeholder="Номер телефона">
                        <span class="authorization-form_error">
                        </span>
                        <input type="password" name="pass" class="authorization-form_input" placeholder="Пароль">
                        <span class="authorization-form_error">
                        </span>
                        <button class="authorization-form_btn">авторизация</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="h-bottom">
        <div class="wrap">
            <div class="header-bottom">
                <div class="search">
                    <input type="text" class="search-input"><button class="search-btn">go</button>
                </div>
                <div class="header-bottom_nav">
                    <button class="menu-part_hidden">
                            <span class="menu-hidden">
                                Меню
                            </span>
                        <span class="menu-hidden">
                                ☰
                            </span>
                    </button>
                    <div class="menu-wrap">
                        <nav class="menu">
                            <li class="menu-link">
                                <a href="#" class="menu-link_title">Каталог</a>
                                <button class="menu-link_btn">➤</button>
                                <div class="menu-link_info">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eum minima aspernatur
                                </div>
                            </li>
                            <li class="menu-link">
                                <a href="#" class="menu-link_title">Новости</a>
                                <button class="menu-link_btn">➤</button>
                                <div class="menu-link_info">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eum minima aspernatur sit natus, ratione minus aliquam, quod sint. Delectus error iste ducimus ab neque iusto fugiat possimus, optio atque.
                                </div>
                            </li>
                            <li class="menu-link">
                                <a href="#" class="menu-link_title">Гарантии</a>
                                <button class="menu-link_btn">➤</button>
                                <div class="menu-link_info">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eum minima aspernatur sit natus, ratione minus aliquam, quod sint. Delectus error iste ducimus ab neque iusto fugiat possimus, optio atque.
                                </div>
                            </li><li class="menu-link">
                                <a href="#" class="menu-link_title">оплата</a>
                                <button class="menu-link_btn">➤</button>
                                <div class="menu-link_info">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eum minima aspernatur sit natus, ratione minus aliquam, quod sint. Delectus error iste ducimus ab neque iusto fugiat possimus, optio atque.
                                </div>
                            </li>
                            <li class="menu-link">
                                <a href="#" class="menu-link_title">доставка</a>
                                <button class="menu-link_btn">➤</button>
                                <div class="menu-link_info">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eum minima aspernatur sit natus, ratione minus aliquam, quod sint. Delectus error iste ducimus ab neque iusto fugiat possimus, optio atque.
                                </div>
                            </li>
                            <li class="menu-link">
                                <a href="#" class="menu-link_title">контакты</a>
                                <button class="menu-link_btn">➤</button>
                                <div class="menu-link_info">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eum minima aspernatur sit natus, ratione minus aliquam, quod sint. Delectus error iste ducimus ab neque iusto fugiat possimus, optio atque.
                                </div>
                            </li>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>