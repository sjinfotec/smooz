<template>
  <div>
    <div>
      <h3>見積作成</h3>
    </div>
    <div id="cnt1" >
      <div id="department01">
        <div class="cate"><h4 class="lspacing1">発送</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <label>市内<input type="text" class="form_style input_w3" name="send_city">個口</label>
            </div>
            <div class="inputgroup">
              <label class="mgl20">道内<input type="text" class="form_style input_w3" name="send_in_dou">個口</label>
            </div>
            <div class="inputgroup">
              <label class="mgl20">道外<input type="text" class="form_style input_w3" name="send_out_dou">個×</label>
              <label>￥<input type="text" class="form_style input_w5" name="send_out_dou_yen"></label>
            </div>
            <div class="inputgroup">
              <label class="mgl20">一括配送<input type="text" class="form_style input_w5" name="send_all"></label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->


      <div id="department01" class="mgt40">
        <div class="cate"><h4>付加費用</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">購入先・バテント・部材・数量など</div>
          </div>
          <div class="group">
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w40" name="addition_cost1"></label>
            </div>
            <div class="inputgroup">
              <label>購入費<input type="text" class="form_style input_w5" name="addition_cost1_buy"><span class="txtcolor1">加算</span></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w40" name="addition_cost2"></label>
            </div>
            <div class="inputgroup">
              <label>購入費<input type="text" class="form_style input_w5" name="addition_cost2_buy"><span class="txtcolor1">加算</span></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w40" name="addition_cost3"></label>
            </div>
            <div class="inputgroup">
              <label>購入費<input type="text" class="form_style input_w5" name="addition_cost3_buy"><span class="txtcolor1">加算</span></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w40" name="addition_cost4"></label>
            </div>
            <div class="inputgroup">
              <label>購入費<input type="text" class="form_style input_w5" name="addition_cost4_buy"><span class="txtcolor1">加算</span></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w40" name="addition_cost5"></label>
            </div>
            <div class="inputgroup">
              <label>購入費<input type="text" class="form_style input_w5" name="addition_cost5_buy"><span class="txtcolor1">加算</span></label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->


      <div id="department01">
        <div class="cate2"><h4>製品全体の外注</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup2">
              <button type="button" id="product_all_outsou1_btn" @click="OutsourcingButton('product_all_outsou1');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="product_all_outsou1" id="product_all_outsou1">
            </div>
            <div class="inputgroup2">
              <label>外注費<input type="text" class="form_style input_w5" name="product_all_outsou1_cost"></label>
            </div>
          </div>
          <div class="group">
            <div class="inputgroup">
              <button type="button" id="product_all_outsou2_btn" @click="OutsourcingButton('product_all_outsou2');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="product_all_outsou2" id="product_all_outsou2">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="product_all_outsou2_cost"></label>
            </div>
          </div>
          <div class="group">
            <div class="inputgroup">
              <button type="button" id="product_all_outsou3_btn" @click="OutsourcingButton('product_all_outsou3');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="product_all_outsou3" id="product_all_outsou3">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="product_all_outsou3_cost"></label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div class="line mgt40">
          <div id="zukei" class="mglrauto">
            <div class="yajirushi_1"></div>
          </div>
      </div>
      <div class="line">
          <div class="mglrauto">
            <button type="button" id="setcal_btn" @click="SettingBtn();">設定</button>
          </div>
      </div>

    </div><!--end id cnt1-->


    <div id="area1">
      <div v-if="outsourcingview == true">
        <out-sourcing
        v-bind:input-textid="inputtextid"
        v-on:oscancel-event="OScancel"
        v-on:selectos-event="selectOS"
        ></out-sourcing>
      </div>
    </div>

  </div>
</template>
<script>
// import mit-parts from "./Parts.vue";
//import moment from "moment";
//import { dialogable } from "../mixins/dialogable.js";
//import { checkable } from "../mixins/checkable.js";
import { requestable } from "../mixins/requestable.js";


export default {
  name: "Mmake",
  //mixins: [dialogable, checkable, requestable],
  mixins: [requestable],
  props: {
  /*
    authusers: {
      type: Array,
      default: []
    }
  */
  },
  /*
  components: {
    mit-parts: mit-parts,
  },
  */
  data() {
    return {
      details: [],
      login_user_code: 0,
      login_user_role: 0,
      dialogVisible: false,
      messageshowsearch: false,

      partsview: false,
      outsourcingview: false,
      inputid: "",
      targetid: "",
      pagenum: "",
      pagename: "",
      inputtextid: ""
    };
  },
  // マウント時
  mounted() {
    //this.login_user_code = this.authusers["code"];
    //this.login_user_role = this.authusers["role"];
  },
  methods: {
    // -------------------- イベント処理 --------------------
    OnButtonClick(t) {
      var tm = t + '_mark';
      var inputid = document.getElementById(t);
      var inputvalue = inputid.value;
      var targetid = document.getElementById(tm);
      if (inputvalue == "1") { 
        targetid.style.visibility = "hidden";
        inputid.value = "0";
      }
      else if (inputvalue == "0") {
        targetid.style.visibility = "visible";
        inputid.value = "1";
      }
    },

    OnButtonClickT(t) {
      var tm = t + '_mark';
      var tb = t + '_btn';
      var inputid = document.getElementById(t);
      var inputvalue = inputid.value;
      var targetid = document.getElementById(tm);
      var btnid = document.getElementById(tb);
      if (inputvalue == "1") { 
        targetid.style.visibility = "hidden";
        inputid.value = "0";
        btnid.innerHTML = "通し無し";
      }
      else if (inputvalue == "0") {
        targetid.style.visibility = "visible";
        inputid.value = "2";
        btnid.innerHTML = "通し有り";
      }
      else if (inputvalue == "2") {
        targetid.style.visibility = "visible";
        inputid.value = "1";
        btnid.innerHTML = "印刷有り";
      }
    },

    OnButtonClickD(t) {
      var tm = t + '_mark';
      var tb = t + '_btn';
      var inputid = document.getElementById(t);
      var inputvalue = inputid.value;
      var targetid = document.getElementById(tm);
      var btnid = document.getElementById(tb);
      if (inputvalue == "0") { 
        targetid.style.visibility = "visible";
        inputid.value = "1";
        btnid.innerHTML = "断裁・一般";
      }
      else if (inputvalue == "1") {
        targetid.style.visibility = "visible";
        inputid.value = "2";
        btnid.innerHTML = "断裁・インサータ";
      }
      else if (inputvalue == "2") {
        targetid.style.visibility = "hidden";
        inputid.value = "0";
        btnid.innerHTML = "断裁";
      }
    },

    OnButtonClick01(t,arr) {
      let idname_array = new Object(); 
      idname_array[0] = ['inch', 'milli'];
      idname_array[2] = ['nisu_single', 'nisu_double'];
      idname_array[3] = ['sei_marble', 'sei_cross'];
      idname_array[4] = ['sei_mat_maki_cardboard', 'sei_mat_cardboard'];
      idname_array[5] = ['sei_kurumi', 'sei_musen_tozi', 'sei_naka_tozi'];
      idname_array[6] = ['sei_bara', 'sei_oneset'];
      idname_array[7] = ['sei_a_system', 'sei_c_system'];

      for (let i = 0 ; i < idname_array[arr].length ; i++){
        var n = idname_array[arr][i];
        var nm = n + '_mark';
        var inputid = document.getElementById(n);
        var inputvalue = inputid.value;
        var targetid = document.getElementById(nm);

        if ( idname_array[arr][i] == t ) {
          if (inputvalue == "1") { 
            targetid.style.visibility = "hidden";
            inputid.value = "0";
          }
          else if (inputvalue == "0") {
            targetid.style.visibility = "visible";
            inputid.value = "1";
          }
        }
        else {
          targetid.style.visibility = "hidden";
          inputid.value = "0";
        } 
      }
    },

    OnButtonClick02(t,arr) {
      let idname_array = new Object(); 
      idname_array[1] = ['wkake', 'ana2', 'ana6', 'donko', 'katanuki', 'kasutori'];

      for (let i = 0 ; i < idname_array[arr].length ; i++){
        var n = idname_array[arr][i];
        var nm = n + '_mark';
        var inputid = document.getElementById(n);
        var inputvalue = inputid.value;
        var targetid = document.getElementById(nm);
        var passmark = false;

        if ((n == 'wkake' && t == 'katanuki') || (t == 'wkake' && n == 'katanuki')) {
         var passmark = true;
        }
        else if ((n == 'kasutori' && t == 'katanuki') || (t == 'kasutori' && n == 'katanuki')) {
         var passmark = true;
        }

        if ( idname_array[arr][i] == t ) {
          if (inputvalue == "1") { 
            targetid.style.visibility = "hidden";
            inputid.value = "0";
          }
          else if (inputvalue == "0") {
            targetid.style.visibility = "visible";
            inputid.value = "1";
          }
        }
        else {
          if ( passmark == false ) {
          targetid.style.visibility = "hidden";
          inputid.value = "0";
          }
        } 
      }
    },
    OnButtonClick03(t,arr,t2) {
      let idname_array = new Object(); 
      idname_array[0] = ['inch', 'milli'];

      for (let i = 0 ; i < idname_array[arr].length ; i++){
        var n = idname_array[arr][i];
        var nm = n + '_mark';
        var inputid = document.getElementById(t2);
        var inputvalue = inputid.value;
        var targetid = document.getElementById(nm);

        if ( idname_array[arr][i] == t ) {
          if( t == 'inch') {
            if (inputvalue == "1") { 
              targetid.style.visibility = "hidden";
              inputid.value = "0";
            }
            else if (inputvalue == "0" || inputvalue == "2") {
              targetid.style.visibility = "visible";
              inputid.value = "1";
            }
          }
          else if ( t == 'milli') {
            if (inputvalue == "2") { 
              targetid.style.visibility = "hidden";
              inputid.value = "0";
            }
            else if (inputvalue == "0" || inputvalue == "1" ) {
              targetid.style.visibility = "visible";
              inputid.value = "2";
            }
          }
        }
        else {
          targetid.style.visibility = "hidden";
          //inputid.value = "0";
        } 
      }
    },

    SetParts(pnum,pname) {
      const tid = "cnt1";
      var targetid = document.getElementById(tid);
      targetid.style.visibility = "hidden";
      //現在未使用
      var arrayParams = { 
        pagenum : pnum ,
        pagename : pname,
        partsview : true
      };
      this.postRequest("/parts/get", arrayParams)
        .then(response  => {
          this.getThen(response);
        })
        .catch(reason => {
          this.serverCatch("取得");
        });


      this.pagenum = pnum;
      this.pagename = pname;

      this.partsview = true;
      console.log('SetParts コンソール出力 = ' + pname);


    },
    Pcancel() {
      const tid = "cnt1";
      var targetid = document.getElementById(tid);
      targetid.style.visibility = "visible";
      this.partsview = false;

      console.log('パーツ画面Parts.vue 終了');

    },
    OScancel() {
      //const tid = "cnt1";
      //var targetid = document.getElementById(tid);
      //targetid.style.visibility = "visible";
      this.outsourcingview = false;

      console.log('外注先画面Outsourcing.vue 終了');

    },
    selectOS(event,param1) {
      //const tid = "cnt1";
      //var targetid = document.getElementById(tid);
      //targetid.style.visibility = "visible";
      //this.event.value = event;
      var target_inputid = document.getElementById(event);
      target_inputid.value = param1;
      this.outsourcingview = false;
      console.log('Mmake.vue selectOS event = ' + event);

    },
    OutsourcingButton(t) {

      //id="product_all_outsou2_btn" @click="OutsourcingButton('product_all_outsou2')
      //var inputtextid = t;
      var tbid = t + '_btn';
      var targetid = document.getElementById(t);
      var viewtaget = document.getElementById('area1');

        var textbox =  document.getElementById('TextArea1');
        var elem = document.getElementById(tbid);
        var rect = elem.getBoundingClientRect();
        var elemtop = rect.top + window.pageYOffset - 0;
        var elemleft = rect.left + window.pageXOffset;
        var elembottom = rect.bottom + window.pageYOffset;
        var elemright = rect.right + window.pageXOffset;
        //textbox.value = 'top:' + elemtop+'\r\n'; 
        //textbox.value += 'left:' + elemleft+'\r\n'; 
        //textbox.value += 'bottom:' + elembottom+'\r\n'; 
        //textbox.value += 'right:' + elemright+'\r\n'; 
      console.log('Button y = ' + elemtop);
      viewtaget.style.position = 'absolute'; 
      viewtaget.style.top = elemtop + 'px';
      //viewtaget.style.left = pageX + 'px';
      viewtaget.style.left = '0px';



      //this.pagenum = pnum;
      //this.pagename = pname;

      this.inputtextid = t;
      this.outsourcingview = true;
      console.log('OutsourcingButton 引数 = ' + t);



    },


    // -------------------- サーバー処理 --------------------
    // -------------------- 共通 --------------------
    // 取得正常処理
    getThen(response) {
      console.log('正常');
    },
    // 異常処理
    serverCatch(eventtext) {
      console.log('異常処理');
    },
  }
};
</script>
