<template>
   <div>
      <div class="headers">
         <h2 class="block-title">Онлайн консультация</h2>
         <div class="buttons view-mode">
            <button class="grid"><i class="fa fa-th fa-2x"></i></button>
            <button class="list"><i class="fa fa-th-list fa-2x"></i></button>
         </div>
      </div>


      <div class="doctors">
         <div class="doctor" v-for="doctor in doctors">
            <div class="photo"><a href="#"><img :src="doctor['photo']" /></a></div>
            <div class="information">
               <div class="field name"><a href="#">{{doctor['fullname']}}</a></div>
               <div class="field"><span class="label">Специальность:{{doctor['specialization']}}</span> </div>
               <div class="field"><span class="label">Профиль: {{doctor['profile']}}</span> </div>
               <div class="field"><span class="label">Квалификация:</span> {{doctor['qualification']}} </div>
               <div class="field"><span class="label">Стаж работы:</span> {{doctor['experience']}}</div>
               <div class="field"><span class="label">Языки консультации:</span> {{doctor['lang']}}</div>
            </div>
            <div class="buttons">
               <div class="order">
                  <a href="#" class="button online">Онлайн консультация
                     <span class="price"><span>{{ doctor['online_consultation_price'] }}</span> <span>{{ doctor['online_consultation_period'] }}</span></span>
                  </a>
                  <a href="#" class="button offline">Запись на очный прием
                     <span class="price"> <span>{{ doctor['offline_consultation_price'] }}</span> <span>{{ doctor['offline_consultation_period'] }}</span> </span>
                  </a>
               </div>
               <a href="" class="link">Подробнее <span class="arrow">➔</span> </a>
            </div>
         </div>
      </div>
   </div>
</template>


<script>

export default {

   data() {
      return {
         doctors: [],
      }
   },

   mounted(){
      axios.get('/api/get_doctors').then((response) => {
         this.doctors = response.data
         console.log(this.doctors);
      });
   }


}

</script>

<style lang="scss">
.doctor{
   display: flex;
   flex-direction: row;
   // box-shadow: 0 1px 5px 0 rgba(0,0,0,.1), 0 1px 5px 0 rgba(0,0,0,.1);
   padding: 20px;
   border-radius: 4px;
   margin-bottom: 20px;
   border:1px solid rgba(0,0,0,.15);
   &.promo{
      border:2px solid #8ce88c;
   }
   .buttons{
      flex:1;
      display: flex;
      align-items: flex-end;
      flex-direction: column;
      justify-content: space-between;
      .button{
         width: 240px;
         display: block;
         padding: 6px 0;
         text-align: center;
         box-shadow: 0 0 2px 1px rgba(0,0,0,.15);
         color: #fff;
         margin-bottom: 18px;
         font-size: 14px;
         text-transform: uppercase;
         border-radius: 2px;
         letter-spacing: 1px;
         transition: .3s;
         text-shadow: 0px 0px 1px #fff;
         &.offline{
            background: #673ab7;
            &:hover{
               background: rgb(58, 117, 184);
            }
         }
         &.online{
            background: rgb(58, 117, 184);
            &:hover{
               background: #673ab7;
            }
         }
         .free{
            position: relative;
            bottom: -6px;
            padding: 2px 0;
            background: #fff;
            width: 100%;
            color: #fff;
            border-radius: 2px;
            font-size: 14px;
            text-align: center;
            display: block;
            // font-weight: 600;
            background: #8ce88c;
            text-shadow: 0 0 10px rgba(0,0,0,.2);
         }
         .price{
            position: relative;
            bottom: -6px;
            padding: 2px 0;
            background: #fff;
            width: 100%;
            display: flex;
            flex-direction: row;
            color: #404040;
            border-radius: 2px;
            font-size: 13px;
            text-transform: lowercase;
            &:after{
               display: block;
               content: '';
               width: 1px;
               height: 100%;
               background:rgba(0, 0, 0, 0.15);
               position: absolute;
               left: 50%;
               transform: translateX(-50);
               top: 0;
            }
            span{
               width: 50%;
               display: block;
            }
         }


      }

      .link{
         display: flex;
         align-items: flex-end;
         color: #673ab7;
         font-weight: 600;
         letter-spacing: 1px;
         transition: .3s;
         .arrow{
            margin-bottom: -2px;
         }
         &:hover{
            color: rgb(58, 117, 184);
         }
      }
   }
   .photo{
      margin-right: 40px;
      display: flex;
      align-items: center;
   }
   .information{
      flex:2;
      .name{
         font-size: 24px;
         font-weight: 600;
      }

      .field{
         margin: 8px 0;
         .label{
            color: #747373;
         }

      }
   }
}

</style>
