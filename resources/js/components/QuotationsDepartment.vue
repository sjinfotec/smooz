<template>
  <div>
    <div>
      <h3>見積作成</h3>
    </div>
    <div id="cnt1" >
      <div id="department01">
        <div class="cate"><h4>フォーム部</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <span id="wkake_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="wkake_btn" @click="OnButtonClick02('wkake',1);">Ｗ掛け</button>
              <input type="text" class="input_w1" value="0" name="wkake" id="wkake">
            </div>
            <div class="inputgroup">
              <span id="daenpin_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="daenpin_btn" @click="OnButtonClick('daenpin');">楕円ピン</button>
              <input type="text" class="input_w1" value="0" name="daenpin" id="daenpin">
            </div>
            <div class="inputgroup">
              <span id="ana2_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="ana2_btn" @click="OnButtonClick02('ana2',1);">２穴</button>
              <input type="text" class="input_w1" value="0" name="ana2" id="ana2">
            </div>
            <div class="inputgroup">
              <span id="ana6_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="ana6_btn" @click="OnButtonClick02('ana6',1);">６穴</button>
              <input type="text" class="input_w1" value="0" name="ana6" id="ana6">
            </div>
            <div class="inputgroup">
              <span id="donko_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="donko_btn" @click="OnButtonClick02('donko',1);">ドンコ</button>
              <input type="text" class="input_w1" value="0" name="donko" id="donko">
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span id="katanuki_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="katanuki_btn" @click="OnButtonClick02('katanuki',1);">型ヌキ</button>
              <input type="text" class="input_w1" value="0" name="katanuki" id="katanuki">
            </div>
            <div class="inputgroup">
              <button type="button" id="katanuki_outsou_btn" @click="OutsourcingButton('katanuki_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="katanuki_outsou" id="katanuki_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="katanuki_outsou_cost"></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span id="kasutori_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="kasutori_btn" @click="OnButtonClick02('kasutori',1);">カス取</button>
              <input type="text" class="input_w1" value="0" name="kasutori" id="kasutori">
            </div>
            <div class="inputgroup">
              <button type="button" id="kasutori_outsou_btn" @click="OutsourcingButton('kasutori_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="kasutori_outsou" id="kasutori_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="kasutori_outsou_cost"></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span id="nisu_single_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="nisu_single_btn" @click="OnButtonClick01('nisu_single',2);">ニス片面</button>
              <input type="text" class="input_w1" value="0" name="nisu_single" id="nisu_single">
            </div>
            <div class="inputgroup">
              <span id="nisu_double_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="nisu_double_btn" @click="OnButtonClick01('nisu_double',2);">ニス両面</button>
              <input type="text" class="input_w1" value="0" name="nisu_double" id="nisu_double">
            </div>
            <div class="inputgroup">
              ＴＳＲスキップ
              <label><input type="text" class="form_style input_w2" name="tsr_times">回</label>
              ×
              <label><input type="text" class="form_style input_w5" name="tsr_through">通</label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label>色替<input type="text" class="form_style input_w2" name="form_color_change">回</label>
            </div>
            <div class="inputgroup">
              <label>カーボン型<input type="text" class="form_style input_w2" name="form_carbon_mold">版</label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div id="department01">
        <div class="cate2"><h4>フォーム部の全部</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup2">
              <button type="button" id="form_all_outsou_btn" @click="OutsourcingButton('form_all_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="form_all_outsou" id="form_all_outsou">
            </div>
            <div class="inputgroup2">
              <label>外注費<input type="text" class="form_style input_w5" name="form_all_outsou_cost"></label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div id="department01" class="mgt40">
        <div class="cate"><h4>オフセット部</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <label>色替<input type="text" class="form_style input_w2" name="offset_color_change">回</label>
            </div>
            <div class="inputgroup">
              <label>カーボン型<input type="text" class="form_style input_w2" name="offset_carbon_mold">版</label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div id="department01" class="mgt40">
        <div class="cate"><h4>組版・製版</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <label>版下
              <select name="block_copy" class="form_style">
              <option value=""></option>
              <option value="新版">新版</option>
              <option value="修正">修正</option>
              <option value="在版">在版</option>
              <option value="インコー">インコー</option>
              <option value="編集（支給）">編集（支給）</option>
              </select>
              </label>
            </div>
            <div class="inputgroup">
              <label>種別
              <select name="kinds" class="form_style">
              <option value=""></option>
              <option value="一般">一般</option>
              <option value="フォーム">フォーム</option>
              <option value="偽造防止">偽造防止</option>
              <option value="名刺">名刺</option>
              <option value="封筒">封筒</option>
              <option value="デザイン">デザイン</option>
              </select>
              </label>
            </div>
            <div class="inputgroup">
              <label>難度
              <select name="difficulty" class="form_style">
              <option value=""></option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="インコー">インコー</option>
              <option value="修正無し">修正無し</option>
              <option value="在版">在版</option>
              </select>
              </label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <button type="button" id="plate_making_outsou_btn" @click="OutsourcingButton('plate_making_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="plate_making_outsou" id="plate_making_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="plate_making_outsou_cost"></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label>ＣＴＰ<input type="text" class="form_style input_w2" name="ctp">版</label>
            </div>
            <div class="inputgroup">
              <label class="mgl20">インクジェット
              <select name="inkjet" class="form_style">
              <option value=""></option>
              <option value="A1">A1</option>
              <option value="A2">A2</option>
              <option value="A3">A3</option>
              <option value="A4以下">A4以下</option>
              <option value="B3">B3</option>
              <option value="B4">B4</option>
              <option value="B5以下">B5以下</option>
              </select>
              </label>
              <label><input type="text" class="form_style input_w2" name="inkjet_sheet">枚</label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              オンデマンド
              <span class="mgl20">色数...</span>
              <label>表<input type="text" class="form_style input_w2" name="ondemand_color_front"></label>
              <label>裏<input type="text" class="form_style input_w2" name="ondemand_color_back"></label>
            </div>
            <div class="inputgroup">
              <span class="mgl20">通し...</span>
              <label>表<input type="text" class="form_style input_w2" name="ondemand_through_front">×10</label>
              <label class="mgl10">裏<input type="text" class="form_style input_w2" name="ondemand_through_back">×10</label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div id="department01" class="mgt40">
        <div class="cate"><h4>コレーター部</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <label>コレーター<input type="text" class="form_style input_w2" name="collator">台</label>
            </div>
            <div class="inputgroup">
              <label class="mgl20">ベーベ<input type="text" class="form_style input_w2" name="bebe">台</label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span id="envelope_process_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="envelope_process_btn" @click="OnButtonClick('envelope_process');">封筒加工</button>
              <input type="text" class="input_w1" value="0" name="envelope_process" id="envelope_process">
            </div>
            <div class="inputgroup">
              <span id="tape_process_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="tape_process_btn" @click="OnButtonClick('tape_process');">テープ加工</button>
              <input type="text" class="input_w1" value="0" name="tape_process" id="tape_process">
            </div>
            <div class="inputgroup">
              <span id="peel_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="peel_btn" @click="OnButtonClick('peel');">剥離糊</button>
              <input type="text" class="input_w1" value="0" name="peel" id="peel">
            </div>
            <div class="inputgroup">
              <span id="press_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="press_btn" @click="OnButtonClick('press');">プレス</button>
              <input type="text" class="input_w1" value="0" name="press" id="press">
            </div>
            <div class="inputgroup">
              <span id="sheetcut_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="sheetcut_btn" @click="OnButtonClick('sheetcut');">シートカット</button>
              <input type="text" class="input_w1" value="0" name="sheetcut" id="sheetcut">
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label>クラッシュNo.<input type="text" class="form_style input_w2" name="collator_cno">ヶ所</label>
            </div>
            <div class="inputgroup">
              <label class="mgl20">穴<input type="text" class="form_style input_w2" name="collator_ana">ヶ所</label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div id="department01">
        <div class="cate2"><h4>コレーター部の全部</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup2">
              <button type="button" id="collator_all_outsou_btn" @click="OutsourcingButton('collator_all_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="collator_all_outsou" id="collator_all_outsou">
            </div>
            <div class="inputgroup2">
              <label>外注費<input type="text" class="form_style input_w5" name="collator_all_outsou_cost"></label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div id="department01" class="mgt40">
        <div class="cate"><h4>ネームライナー</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <label>名刺<input type="text" class="form_style input_w2" name="nl_color">色</label>
            </div>
            <div class="inputgroup">
              <label class="mgl20">
              <select name="nl_hagaki" class="form_style">
              <option value=""></option>
              <option value="ハガキ単">ハガキ単</option>
              <option value="ハガキ単両">ハガキ単両</option>
              <option value="２つ折ハガキ">２つ折ハガキ</option>
              <option value="３つ折ハガキ">３つ折ハガキ</option>
              </select>
              </label>
              <label><input type="text" class="form_style input_w2" name="nl_hagaki_color">色</label>
            </div>
            <div class="inputgroup">
              <label class="mgl20">封筒<input type="text" class="form_style input_w2" name="nl_envelope_color">色</label>
            </div>
            <div class="inputgroup">
              <label class="mgl20">No.<input type="text" class="form_style input_w2" name="nl_number_part">ヶ所</label>
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
  name: "QuotationsDepartment",
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
