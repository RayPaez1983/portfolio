<?php 
    get_header();
    global $post, $project_options;

    if( is_home() || is_front_page() ) { ?>
        <section class="p-homepage">
            <header class="p-homepage__header">
                <div class="avatar" id="fredy">
                    <img src="<?php echo get_template_directory_uri() . '/images/fredhotel1.jpg' ?>" alt="">
                    <div class="avatar__slider">                    
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><p>ILLUSTRATOR</p></div>
                            <div class="swiper-slide"><p>WEB DESIGNER</p></div>
                            <div class="swiper-slide"><p>CUSTOMER SERVICE</p></div>
                        </div>
                    </div>
                </div>
                <div class="p-homepage__header__slider">    
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <img data-stellar-ratio="0.5" class="picture" src="<?php echo get_template_directory_uri() . '/images/ligthbuld.jpg' ?>" alt="">
                        </div>  
                        <div class="swiper-slide">
                           <img data-stellar-ratio="0.5" class="picture" src="<?php echo get_template_directory_uri() . '/images/meeting.jpg' ?>" alt="">
                        </div>
                        <div class="swiper-slide">
                           <img data-stellar-ratio="0.5" class="picture" src="<?php echo get_template_directory_uri() . '/images/hw1.jpg' ?>" alt="">
                        </div>                                             
                    </div>
                </div>   
            </header>

            <section class="p-homepage__about section" id="about">
                <h2>ABOUT</h2>
                 <div class="container">
                    <div class="p-homepage__about__photo">
                            <img src="<?php echo get_template_directory_uri() . '/images/fredlifeafar.jpg' ?>" alt="">
                        </div>
                     <div class="p-homepage__about__content">
                            <p class="paragraph">Morbi rutrum, elit ac fermentum egestas, tortor ante vestibulum est, 
                            eget scelerisque nisl velit eget tellus. Lorem dolor amet, consectetuer adipiscing elit. 
                            Nullam dignissim convallis est. Quisque aliquam. cite. Nunc iaculis suscipit dui. Nam sit amet sem. 
                            Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Morbi rutrum, elit ac fermentum 
                            egestas, tortor ante vestibulum est, eget scelerisque nisl velit eget tellus..</p>                       
                        <div class="p-homepage__about__skills-section">
                            <h2 > My Skills</h2>
                            <div class="skill">
                                <p>HTML5</p>
                                <p class="skill-count1">95%</p>
                                <div  class="skill-bar skill1 wow slideInLeft animated">
                                    
                                </div>
                            </div>
                            <div class="skill">
                                <p>CSS</p>
                                <p class="skill-count2">85%</p>
                                <div class="skill-bar skill2 wow slideInLeft animated">
                                     
                                </div>
                            </div>
                            <div class="skill">
                                <p>JAVASCRIP</p>
                                <p class="skill-count3">65%</p>
                                <div class="skill-bar skill3 wow slideInLeft animated">
                                    
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </section>

            <section class="p-homepage__services" id="services">
                <div class="container">
                    <div class="p-homepage__services__content">
                    <h2>SERVICES</h2>                    
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci aliquam nobis nihil nemo quod ipsa, rem voluptatem odit, molestias iusto tempore</p>       
                    </div>  
                    <div class="grid">
                    <div class="col-5_xs-12">
                        <?php for ($i=0; $i<=2; $i++){  ?>
                            <div class="services-item">
                                <h3>
                                    WEB DESIGN
                                    <img src="<?php echo get_template_directory_uri() . '/images/icons/brain1.png' ?>" alt="">
                                </h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto deleniti nemo, quae nisi unde, officiis culpa quisquam praesentium omnis dicta ea cumque velit possimus et voluptatem itaque ratione quod. Ea!</p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-5_xs-12 " data-push-left="off-2_xs-0">
                        <?php for ($i=0; $i<=2; $i++){  ?>
                            <div class="services-item even">
                                <h3>
                                    <img src="<?php echo get_template_directory_uri() . '/images/icons/cube1.png' ?>" alt="">
                                    WEB DESIGN
                                </h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto deleniti nemo, quae nisi unde, officiis culpa quisquam praesentium omnis dicta ea cumque velit possimus et voluptatem itaque ratione quod. Ea!</p>
                            </div>
                        <?php } ?>
                    </div>
                    </div>
                    <div class="testimonials">
                    <h3 class="testimonials__title">TESTIMONIALS</h3>
                    <div class="testimonials__slider">
                        <div class="swiper-wrapper">
                            <?php for ($i=0; $i<=3; $i++){  ?>
                                <article class="swiper-slide">
                                    <img src="<?php echo get_template_directory_uri() . '/images/icons/icon-quote.svg' ?>" alt="">
                                    <img src="<?php echo get_template_directory_uri() . '/images/icons/icon-quote.svg' ?>" alt="">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis maxime, ad illo delectus, laborum sunt itaque voluptates at ullam quam nulla nesciunt deleniti assumenda unde exercitationem. Animi voluptate fugiat earum!</p>
                                    <h3>Client Name, Company name</h3>
                                </article>  
                            <?php } ?>                                 
                        </div>                
                    </div>
                    <div class="swiper-pagination"></div>
                    </div>
                </div>    
            </section>

            <section class="p-homepage__portfolio" id="portfolio">
                <h2>PORTFOLIO</h2>
                <p class="p-homepage__portfolio-paragraph">Click on the picture to see the project details in lightbox.</p>
                
                <div class="p-homepage__portfolio-lightbox">
                    <?php for($i=0; $i <= 3; $i++) {  ?>
                        <div class="lightbox-item">
                            <a href="<?php echo get_template_directory_uri() . '/images/hw1.jpg' ?>" data-lightbox="Marriott Cali." data-title="Portfolio Lightbox">
                                <figure>
                                    <img src="<?php echo get_template_directory_uri() . '/images/hw1.jpg' ?>" alt="">
                                </figure>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="p-homepage__portfolio-lightbox even">
                    <?php for($i=0; $i <= 3; $i++) {  ?>
                        <div class="lightbox-item">
                            <a href="<?php echo get_template_directory_uri() . '/images/hw.jpg' ?>" data-lightbox="Marriott Cali." data-title="Portfolio Lightbox">
                                <figure>
                                    <img src="<?php echo get_template_directory_uri() . '/images/hw.jpg' ?>" alt="">
                                </figure>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <section class="p-homepage__contact" id="contact">
                <h2>CONTACT</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint, soluta? Quae, aperiam recusandae? Error sit inventore ab, assumenda unde reprehenderit, enim ipsa aperiam quisquam labore id voluptates aspernatur nisi quibusdam!</p> 
                    <div class="p-homepage__contact__content">
                        <form class="p-homepage__contact__form">
                            <input type="text" placeholder = "Your Name"
                            value=""> 
                            <input type="email" placeholder = "Email"
                            value=""> 
                            <input type="text" placeholder = "Add a brief messega">
                            <input class="submit" type="submit" value="Submit"> 
                        </form> 
                        <iframe class="p-homepage__contact__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.457639662987!2d-75.60519405011495!3d6.203202328503906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e46820eaada9999%3A0x6e8c158d8e78f856!2sUnidad%20Residencial%20Dominica!5e0!3m2!1sen!2sco!4v1576873626347!5m2!1sen!2sco" width="600" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div class="p-homepage__contact__information">
                            <span>Office: Calle 9sur # 79c - 139</span>
                            <span>Phone: 350 296-7043</span>
                            <span>Email: frp.plata@gmail.com</span>
                    </div>      
            </section>                 
        </section> <?php
    } 
    
    get_footer(); 
?>