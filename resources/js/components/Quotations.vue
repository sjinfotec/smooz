<template>
  <div>
    <div id="cnt_title1">
      <h3>見積作成</h3>
    </div>
    <div id="cnt1" v-if="select_html == 'edit_view'">
      <div id="department01">
        <div class="cate"><h4>基本項目</h4></div>
      </div>

      <div class="line">
        <div class="inputgroup">
          <button>新規</button>
        </div>
        <div class="inputgroup">
          <button>見積書</button>
        </div>
        <div class="inputgroup">
          <label>参照見積番号<input type="text" class="form_style input_w5"></label>
        </div>
        <div class="inputgroup">
          <button>登録</button>
        </div>
        <div class="inputgroup">
          <button>受注</button>
        </div>
        <div class="inputgroup">
          <button>原価閲覧</button>
        </div>
        <div class="inputgroup">
          <button>終了</button>
        </div>
      </div>
      <div v-for="(item,index) in details" v-bind:key="item.id">
        <div class="line">
          <div class="inputgroup">
            <label><span class="spanwidth_8">担当者</span><input type="text" class="form_style" v-model="details[index].manager" name="manager"><span></span></label>
          </div>
        </div>
        <div class="line">
          <div class="inputgroup">
            <label><span class="spanwidth_8">得意先</span><input type="text" class="form_style" v-model="details[index].customer_code" name="customer_code"><input type="text" class="form_style" v-model="details[index].customer" name="customer"></label>
          </div>
        </div>
        <div class="line">
          <div class="inputgroup">
            <label><span class="spanwidth_8">エンドユーザー</span><input type="text" class="form_style input_w30" v-model="details[index].enduser" name="enduser"></label>
          </div>
        </div>
        <div class="line">
          <div class="inputgroup">
            <label><span class="spanwidth_8">製品名</span><input type="text" class="form_style input_w30" v-model="details[index].product" name="product"></label>
          </div>
        </div>
        <div class="line">
          <div class="inputgroup">
            <label><input type="text" class="form_style input_w2" v-model="details[index].parts_num" name="parts_num">P</label>
          </div>
          <div class="inputgroup">
            <label>制作組数<input type="text" class="form_style input_w5" v-model="details[index].production_setnum" name="production_setnum">
            <select name="production_setnum_unit" v-model="details[index].production_setnum_unit" class="form_style">
            <option value=""></option>
            <option v-for="(s001,indexs001) in select_arr_s001" v-bind:value="s001.code" >{{ s001.code_name }}</option>
            </select>
            </label>
          </div>
          <div class="inputgroup">
            <label>制作冊数<input type="text" class="form_style input_w5" v-model="details[index].production_volnum" name="production_volnum">
            <select name="production_volnum_unit" v-model="details[index].production_volnum_unit" class="form_style">
            <option value=""></option>
            <option v-for="(s002,indexs002) in select_arr_s002" v-bind:value="s002.code" >{{ s002.code_name }}</option>
            </select>
            </label>
          </div>
          <div class="inputgroup">
            <span id="printing_mark" class="markzone mz_c1"></span>
            <button type="button" id="printing_btn" @click="OnButtonClickT('printing');">印刷有り</button>
            <input type="text" class="input_w1" value="1" v-model="details[index].printing"  name="printing" id="printing">
          </div>
        </div>
        <div class="line">
          <div class="inputgroup">
            <span id="inch_mark" class="markzone mz_c1 v_hidden"></span>
            <button type="button" id="inch_btn" @click="OnButtonClick03('inch',0,'unit');">インチ</button>
          </div>
          <div class="inputgroup">
            <span id="milli_mark" class="markzone mz_c1 v_hidden"></span>
            <button type="button" id="milli_btn" @click="OnButtonClick03('milli',0,'unit');">ミリ</button>
            <input type="text" class="input_w1" value="0" v-model="details[index].unit" name="unit" id="unit">
          </div>
          <div class="inputgroup">
            <label>紙取<input type="text" class="form_style input_w2" v-model="details[index].papertray" name="papertray">切</label>
          </div>
          <div class="inputgroup">
            面付け...
            <label>横<input type="text" class="form_style input_w2" v-model="details[index].imposition_w" name="imposition_w"></label>
            ×
            <label>縦<input type="text" class="form_style input_w2" v-model="details[index].imposition_h" name="imposition_h"></label>
          </div>
        </div>
        <div class="line">
          <div class="inputgroup">
            <label>シリンダー
            <select name="cylinder" class="form_style" v-model.trim="details[index].cylinder">
            <option value=""></option>
            <option v-for="(s004,indexs004) in select_arr_s004" v-bind:value="s004.code" :key="s004.code">{{ s004.code_name }}</option>
            </select>
            </label>
            <label><input type="text" class="form_style input_w2" v-model="details[index].cylinder_num" name="cylinder_num">本</label>
          </div>
          <div class="inputgroup">
            サイズ...
            <label>横<input type="text" class="form_style input_w3" v-model="details[index].size_w" name="size_w"></label>
            ×
            <label>縦<input type="text" class="form_style input_w3" v-model="details[index].size_h" name="size_h"></label>
            <input type="text" class="form_style input_w2" v-model="details[index].size_top" name="size_top">/<input type="text" class="form_style input_w2" v-model="details[index].size_bottom" name="size_bottom">
            <label>
            <select name="inch_fold" class="form_style" v-model.trim="details[index].inch_fold">
            <option value=""></option>
            <option v-for="(s005,indexs005) in select_arr_s005" v-bind:value="s005.code" :key="s005.code">{{ s005.code_name }}</option>
            </select>
            インチ折
            </label>
            
          </div>
        </div>
        <div class="line">
          <div class="inputgroup">
            <span id="parts1_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts1_btn" @click="SetParts(1,'1P目');">1P目</button>
          </div>
          <div class="inputgroup">
            <span id="parts2_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts2_btn" @click="SetParts(2,'2P目');">2P目</button>
          </div>
          <div class="inputgroup">
            <span id="parts3_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts3_btn" @click="SetParts(3,'3P目');">3P目</button>
          </div>
          <div class="inputgroup">
            <span id="parts4_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts4_btn" @click="SetParts(4,'4P目');">4P目</button>
          </div>
          <div class="inputgroup">
            <span id="parts5_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts5_btn" @click="SetParts(5,'5P目');">5P目</button>
          </div>
        </div>
        <div class="line">
          <div class="inputgroup">
            <span id="parts6_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts6_btn" @click="SetParts(6,'6P目');">6P目</button>
          </div>
          <div class="inputgroup">
            <span id="parts7_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts7_btn" @click="SetParts(7,'7P目');">7P目</button>
          </div>
          <div class="inputgroup">
            <span id="parts8_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts8_btn" @click="SetParts(8,'8P目');">8P目</button>
          </div>
          <div class="inputgroup">
            <span id="parts9_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts9_btn" @click="SetParts(9,'9P目');">9P目</button>
          </div>
          <div class="inputgroup">
            <span id="parts10_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts10_btn" @click="SetParts(10,'10P目');">10P目</button>
          </div>
        </div>

        <div class="line">
          <div class="inputgroup">
            <span id="parts11_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts11_btn" @click="SetParts(11,'11P目');">11P目</button>
          </div>
          <div class="inputgroup">
            <span id="parts12_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts12_btn" @click="SetParts(12,'12P目');">12P目</button>
          </div>
          <div class="inputgroup">
            <span id="parts_omote_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts13_btn" @click="SetParts(13,'表紙');">表紙</button>
          </div>
          <div class="inputgroup">
            <span id="parts_ura_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts14_btn" @click="SetParts(14,'裏表紙');">裏表紙</button>
          </div>
          <div class="inputgroup">
            <span id="parts_mat_mark" class="markzone2 mz_tc1 v_hidden"></span>
            <button type="button" id="parts15_btn" @click="SetParts(15,'下敷き');">下敷き</button>
          </div>
        </div>

        <div id="department01" class="mgt40">
          <div class="inputgroup">
            <label><span class="spanwidth_1">コメント</span>&emsp;<span id="strLen">0文字</span>
            <textarea name="comment" class="form_style_textarea" rows="4" id="textarea1" @keyup="viewStrLen();"></textarea>
            </label>
          </div>
        </div><!--end department01-->
      </div><!--end v-for-->


      <div class="line mgt40">
          <div id="zukei" class="mglrauto">
            <div class="yajirushi_1"></div>
          </div>
      </div>
      <div class="line">
          <div class="mglrauto">
            <button type="button" id="setcal_btn" @click="SetcalBtn();">設定・計算</button>
          </div>
      </div>


      <div id="department01" class="mgt40">
          <div class="group">
            <div class="inputgroup">
              <label><span class="spanwidth_1">提示額</span><input type="text" class="form_style input_w5" name="offered_price"></label>
            </div>
            <div class="inputgroup">
              <button type="button" id="cost_btn" @click="CostBtn();">原価一覧</button>
            </div>
          </div>
      </div><!--end department01-->


      <div id="calculation">
        <h3>計算結果</h3>
        <div class="inputgroup">
        </div>
      </div>

    </div><!--end id cnt1-->

    <div id="partszone" v-if="partsview == true">
      <quotations-parts
       v-bind:page-num="pagenum"
       v-bind:page-name="pagename"
       v-on:pcancel-event="Pcancel"
      ></quotations-parts>
    </div>

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
import { dialogable } from "../mixins/dialogable.js";
import { checkable } from "../mixins/checkable.js";
import { requestable } from "../mixins/requestable.js";


export default {
  name: "Quotations",
  mixins: [dialogable, checkable, requestable],
  //mixins: [requestable],
  props: {
  /*
    authusers: {
      type: Array,
      default: []
    }
  */
    s_m_code: {
      type: String,
      default: ""
    },

  },
  /*
  components: {
    mit-parts: mit-parts,
  },
  */
  data() {
    return {
      details: [],
      details_parts: [],
      index: 0,
      login_user_code: 0,
      login_user_role: 0,
      dialogVisible: false,
      messageshowsearch: false,
      result: false,

      event_title: "",
      actionmsgArr: [],
      select_arr_s001: [],
      select_arr_s002: [],
      select_arr_s003: [],
      select_arr_s004: [],
      select_arr_s005: [],

      //s_m_code: "",


      partsview: false,
      outsourcingview: false,
      inputid: "",
      targetid: "",
      pagenum: "",
      pagename: "",
      inputtextid: "",
      select_html: "",

    };
  },
  // マウント時
  mounted() {
    this.getItem();
    //this.login_user_code = this.authusers["code"];
    //this.login_user_role = this.authusers["role"];
    window.onload = () => {
      //alert("ページが読み込まれました");
      //console.log('window.onload');
      const timeout = '3000';
      setTimeout(() => {
        if(this.result) {
          this.FirstExec();
        }
      }, timeout);
      
      
    };
    document.addEventListener('DOMContentLoaded', function() {
      //console.log('addEventListener');
      //this.FirstExec();
    });

  },
  methods: {
    // -------------------- イベント処理 --------------------
    FirstExec() {
      console.log('FirstExec in ');
      this.OnButtonClickTLoad('printing');
      this.OnButtonClick03Load('', 0, 'unit');
      this.viewStrLen();
    },

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
      //console.log('OnButtonClickT in inputvalue = ' + inputvalue);
      if (inputvalue == "1") { 
        targetid.style.visibility = "hidden";
        inputid.value = "0";
        btnid.innerHTML = "通し無し";
      }
      else if (inputvalue == "0" || inputvalue == "") {
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
    OnButtonClickTLoad(t) {
      var tm = t + '_mark';
      var tb = t + '_btn';
      var inputid = document.getElementById(t);
      var inputvalue = inputid.value;
      var targetid = document.getElementById(tm);
      var btnid = document.getElementById(tb);
      console.log('OnButtonClickTLoad in inputvalue = ' + inputvalue);
      if (inputvalue == "1") { 
        targetid.style.visibility = "visible";
        btnid.innerHTML = "印刷有り";
      }
      else if (inputvalue == "2") {
        targetid.style.visibility = "visible";
        btnid.innerHTML = "通し有り";
      }
      else  {
        targetid.style.visibility = "hidden";
        btnid.innerHTML = "通し無し";
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
    OnButtonClick03Load(t,arr,t2) {
      let idname_array = new Object(); 
      idname_array[0] = {'1':'inch', '2':'milli'};

      var inputid = document.getElementById(t2);
      var inputvalue = inputid.value;

      if(inputvalue >= 1){
        var n = idname_array[arr][inputvalue];
        var nm = n + '_mark';
        var targetid = document.getElementById(nm);
        targetid.style.visibility = "visible";

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

    viewStrLen(){
      var len = document.getElementById("textarea1").value.length;
      document.getElementById("strLen").innerText = len + "文字";
    },

    // -------------------- サーバー処理 --------------------
    // 見積を取得
    getItem: function() {
      console.log('getItem in props s_m_code = ' + this.s_m_code);
      var motion_msg = "見積取得 ー 基本項目";
      var arrayParams = { 
        s_m_code : this.s_m_code , 

      };
      this.postRequest("/qsearch/get", arrayParams)
        .then(response  => {
          this.putThenSearch(response, motion_msg);
        })
        .catch(reason => {
          this.serverCatch("quotations取得");
        });

    },
    // パーツを取得
    getParts: function() {

      var motion_msg = "パーツ";
      var arrayParams = { 
        s_m_code : this.s_m_code , 

      };
      this.postRequest("/qparts/get", arrayParams)
        .then(response  => {
          this.putThenParts(response, motion_msg);
        })
        .catch(reason => {
          this.serverCatch("parts取得");
        });
    },

    // -------------------- 共通 ----------------------------

    // 取得正常処理
    getThen(response) {
      var res = response.data;
      //console.log('getthen in res = ' + res);
      if (res.result) {
        this.details = res.details;
        
      } else {
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("エラー", res.messagedata, "error", true, false);
        } else {
          this.serverCatch("取得");
        }
      }
      console.log('取得正常処理');
    },
    // 検索系正常処理
    putThenSearch(response, eventtext) {
      var messages = [];
      var res = response.data;
      if (res.details.length > 0) {
          this.details = res.details;
          //this.details_parts = res.details_parts;

          //this.classObj1 = (this.details[0].status == 'newest') ? 'bgcolor3' : '';
          //console.log("putThenSearch in res.search_totals = " + res.search_totals[0].total_s);
          //if (res.search_totals) {
          //  this.search_totals = res.search_totals[0].total_s;
          //}
          this.select_arr_s001 = res.select_arr_s001;
          this.select_arr_s002 = res.select_arr_s002;
          this.select_arr_s003 = res.select_arr_s003;
          this.select_arr_s004 = res.select_arr_s004;
          this.select_arr_s005 = res.select_arr_s005;
          //console.log("putThenSearch in res.production_volnum_unit = " + res.pvu);


          this.event_title = res.s_m_code;
          //console.log("putThenSearch in res.s_customer = " + res.s_customer);
          this.$toasted.show(this.event_title + " " + eventtext + "しました");
          //this.actionmsgArr.push(this.event_title + " を検索しました。" , " 検索数 : " + res.details.length + " 件");
          this.result = res.result;
          this.select_html = "edit_view";
      } else {
          //this.actionmsgArr.push(this.s_m_code + " が見つかりませんでした。");
          this.details = [];
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("エラー", res.messagedata, "warning", true, false);
        } else {
          this.serverCatch(eventtext);
        }
      }

    },

    // パーツ取得正常処理
    putThenParts(response, eventtext) {
      var messages = [];
      var res = response.data;
      if (res.details_parts.length > 0) {
          this.details_parts = res.details_parts;
          //console.log("putThenSearch in res.search_totals = " + res.search_totals[0].total_s);
          console.log("putThenParts in" + this.details_parts );

          //this.event_title = res.s_m_code + ' ';
          //console.log("putThenSearch in res.s_customer = " + res.s_customer);
          //this.$toasted.show(this.event_title + " " + eventtext + "しました");
          //this.actionmsgArr.push(this.event_title + " を検索しました。" , " 検索数 : " + res.details.length + " 件");
      } else {
          //this.actionmsgArr.push(this.s_m_code + " が見つかりませんでした。");
          this.details_parts = [];
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("警告", res.messagedata, "warning", true, false);
        } else {
          this.serverCatch(eventtext);
        }
      }
    },

    // 異常処理
    serverCatch(eventtext) {
      var messages = [];
      //messages.push("" + eventtext + "に失敗しました");
      //this.htmlMessageSwal("エラー", messages, "error", true, false);
      console.log('処理未完 -> ' + eventtext);
    },

  }
};
</script>
