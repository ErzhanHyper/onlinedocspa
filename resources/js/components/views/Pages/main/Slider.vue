<template>
   <div class="slider">
      <agile :nav-buttons="true" :dots="true" :autoplay-speed="5000" :speed="800" fade pause-on-hover pause-on-dots-hover autoplay>
         <div class="slide_wrap slide1">
            <div class="slide">
               <div class="slide-in">
                  <div class="text">
                     <h1>ОНЛАЙН КОНСУЛЬТАЦИЯ</h1>
                     <p>
                        &mdash; Видео консультация от лучших врачей <br>
                        &mdash; Экономия времени и денег <br>
                        &mdash; В удобное время и любом месте
                     </p>
                  </div>
                  <div class="image">
                     <img src="img/sliders3.png" class="animated fadeInLeft">
                  </div>
               </div>
            </div>
         </div>

         <div class="slide_wrap slide2">
            <div class="slide">
               <div class="slide-in">
                  <div class="text">
                     <h1>ЗАПИСЬ НА ОЧНЫЙ ПРИЕМ</h1>
                     <p>
                        &mdash; Широкий спектр врачей<br>
                        &mdash; Запись к врачу без ожидания
                     </p>
                  </div>
                  <div class="image">
                     <img src="img/sd.png" class="animated fadeInLeft" alt="">
                  </div>
               </div>
            </div>
         </div>


         <div class="slide_wrap slide2">
            <div class="slide">
               <div class="slide-in">
                  <div class="text">
                     <h1>РАСШИФРОВКА АНАЛИЗОВ, СНИМКОВ КТ, МРТ, РЕНТГЕН</h1>
                     <p>&mdash; Альтернативное мнение <br>
                        &mdash; Заключение специалиста в течение 48 часов</p>
                     </div>
                     <div class="image">
                        <img src="img/sliders1.png" class="animated fadeInLeft" alt="">
                     </div>
                  </div>
               </div>
            </div>

            <button class="fas.fa-chevron-left prevButton" slot="prevButton">Prev</button>
            <button class="fas.fa-chevron-right nextButton" slot="nextButton">Next</button>
         </agile>


      </div>
   </template>
   <script>

   export default {
      data() {
         return {
            name: "Slider",
         }
      },
      mounted() {
         //
      },
      methods: {

      }
   }
   </script>

   <style lang="scss">


   .slider{
      width: 100%;
      z-index: 0;
      overflow: hidden;
      margin-top: 98px;
      .prevButton, .nextButton{
         position: absolute;
         top: 50%;
         transform: translateY(-50%);
         z-index: 20;
         text-indent: -9999px;
         display: block;
         width: 31px;
         height: 31px;
         box-shadow: none;
         border: 0;
         background: rgb(0,0,0);
         border-radius: 100%;
         background-size: 32px;
         cursor: pointer;
         opacity: .2;
         &:hover{
            opacity: .4
         }
      }
      .prevButton{
         background-image: url('/img/arrow_left.svg');
         background-position: -1px 0;
         left: 60px;
      }
      .nextButton{
         background-image: url('/img/arrow_right.svg');
         background-position: 0 0;
         right: 60px;
      }

      .slide_wrap{
         position: relative;
         height: 100%;
         &.agile__slide--active.agile__slide--current{
            .slide-in{
               height: calc(100vh - 98px);
            }
            .text{
               margin-top: 0;
            }
            img{
               margin-right: 12%;
            }
         }

         .text{
            position: absolute;
            top: 40%;
            transform: translateY(-50%);
            width: 55%;
            margin-left: 15%;
            color: #fff;
            margin-top: 200px;
            transition: .4s;
            max-width: 40%;
            p{
               font-size: 18px;
            }
            h1{
               font-size: 36px;
               font-weight: 600;
               margin-bottom: 15px;
            }
         }
         img{
            width: 40%;
            margin-right: 20%;
            float: right;
            margin-top: 15vh;
            transition: .4s;
         }
         &.slide1 {
            background: rgb(55,120,186);
            background: linear-gradient(90deg, rgba(55,120,186,1) 68%, rgba(211,234,239,1) 68%, rgba(211,234,239,1) 100%);
         }
         &.slide2 {

            background: rgb(103,58,183);
            background: linear-gradient(90deg, rgba(103,58,183) 68%, rgba(211,234,239,1) 68%, rgba(211,234,239,1) 100%);
         }
         &.slide3 {
            background: rgb(219,110,110);
            background: linear-gradient(90deg, rgba(219,110,110,1) 100%, rgba(255,235,205,1) 00%);
         }
      }


      .agile__actions{
         height: 0;
         .agile__dots{
            display: flex;
            align-items: center;
            position: absolute;
            bottom: 30px;
            z-index: 30;
            left: 50%;
            transform: translateX(-50%);
            li{
               width: 10px;
               height: 10px;
               margin: 0 4px;
               button{
                  width: 10px;
                  height: 10px;
                  background: #fff;
                  box-shadow: 0;
                  border:0;
                  border-radius: 100%;
                  opacity: .5;
                  transition: .4s;
               }
               &.agile__dot--current button{
                  opacity: 1;
               }
            }
         }
      }
   }

   .navButtons{
      position: absolute;
   }
   </style>
