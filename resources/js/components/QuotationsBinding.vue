<template>
  <div>
    <div id="cnt_title1">
      <h3>見積作成</h3>
    </div>
    <div id="cnt1" v-if="select_html == 'edit_view'">
      <div v-for="(item,index) in details" v-bind:key="item.id">
        <div id="department01">
          <div class="cate"><h4 class="lspacing1">製本</h4></div>
          <div class="area">
            <div class="group">
              <div class="inputgroup">
                <span id="sei_chouai_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="sei_chouai_btn" @click="OnButtonClick('sei_chouai');">丁合</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_chouai" name="sei_chouai" id="sei_chouai">
              </div>
              <div class="inputgroup">
                <button type="button" id="sei_chouai_outsou_btn" @click="OutsourcingButton('sei_chouai_outsou');">外注先</button>
                <input type="text" class="form_style input_w20" value="" v-model="details[index].sei_chouai_outsou" name="sei_chouai_outsou" id="sei_chouai_outsou">
              </div>
              <div class="inputgroup">
                <label>外注費<input type="text" class="form_style input_w5" v-model="details[index].sei_chouai_outsou_cost" name="sei_chouai_outsou_cost"></label>
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <span id="sei_dansai_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="sei_dansai_btn" @click="OnButtonClickD('sei_dansai');">断裁</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_dansai" name="sei_dansai" id="sei_dansai">
              </div>
              <div class="inputgroup">
                <button type="button" id="sei_dansai_outsou_btn" @click="OutsourcingButton('sei_dansai_outsou');">外注先</button>
                <input type="text" class="form_style input_w20" value="" v-model="details[index].sei_dansai_outsou" name="sei_dansai_outsou" id="sei_dansai_outsou">
              </div>
              <div class="inputgroup">
                <label>外注費<input type="text" class="form_style input_w5" v-model="details[index].sei_dansai_outsou_cost" name="sei_dansai_outsou_cost"></label>
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <span id="sei_marble_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="sei_marble_btn" @click="OnButtonClick01('sei_marble',3);">マーブル</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_marble" name="sei_marble" id="sei_marble">
              </div>
              <div class="inputgroup">
                <span id="sei_cross_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="sei_cross_btn" @click="OnButtonClick01('sei_cross',3);">クロス</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_cross" name="sei_cross" id="sei_cross">
              </div>
              <div class="inputgroup">
                <span id="sei_mat_maki_cardboard_mark" class="markzone mz_c3 v_hidden"></span>
                <button type="button" id="sei_mat_maki_cardboard_btn" @click="OnButtonClick01('sei_mat_maki_cardboard',4);">下敷巻ボール</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_mat_maki_cardboard" name="sei_mat_maki_cardboard" id="sei_mat_maki_cardboard">
              </div>
              <div class="inputgroup">
                <span id="sei_mat_cardboard_mark" class="markzone mz_c3 v_hidden"></span>
                <button type="button" id="sei_mat_cardboard_btn" @click="OnButtonClick01('sei_mat_cardboard',4);">下敷ボール</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_mat_cardboard" name="sei_mat_cardboard" id="sei_mat_cardboard">
              </div>
              <div class="inputgroup">
                <label class="mgl20">
                <select name="sei_nori" class="form_style" v-model="details[index].sei_nori">
                <option value=""></option>
                <option value="天">天</option>
                <option value="左">左</option>
                <option value="右">右</option>
                <option value="地">地</option>
                </select>
                糊
                </label>
              </div>
              <div class="inputgroup">
                <label class="mgl20">
                <select name="sei_tsuduri" class="form_style" v-model="details[index].sei_tsuduri">
                <option value=""></option>
                <option value="天">天</option>
                <option value="左">左</option>
                <option value="右">右</option>
                <option value="地">地</option>
                </select>
                綴
                </label>
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <span id="sei_kurumi_mark" class="markzone mz_c2 v_hidden"></span>
                <button type="button" id="sei_kurumi_btn" @click="OnButtonClick01('sei_kurumi',5);">くるみ</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_kurumi" name="sei_kurumi" id="sei_kurumi">
              </div>
              <div class="inputgroup">
                <label class="mgl20">ラミネート
                <select name="sei_laminate" class="form_style" v-model="details[index].sei_laminate">
                <option value=""></option>
                <option value="A3">A3</option>
                <option value="A4">A4</option>
                <option value="A5">A5</option>
                <option value="B4">B4</option>
                <option value="B5">B5</option>
                <option value="B6">B6</option>
                <option value="カード用">カード用</option>
                <option value="ハガキ圧着">ハガキ圧着</option>
                </select>
                </label>
                <label><input type="text" class="form_style input_w2" v-model="details[index].sei_laminate_through" name="sei_laminate_through">通し</label>
              </div>
              <div class="inputgroup">
                <span id="sei_buster_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="sei_buster_btn" @click="OnButtonClick('sei_buster');">バスター</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_buster" name="sei_buster" id="sei_buster">
              </div>
              <div class="inputgroup">
                <span id="sei_crimping_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="sei_crimping_btn" @click="OnButtonClick('sei_crimping');">圧着</button>
                <input type="text" class="input_w1" value="" v-model="details[index].sei_crimping" name="sei_crimping" id="sei_crimping">
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <label><span class="spanwidth_1">手作業</span><input type="text" class="form_style input_w30" v-model="details[index].inside_hand_work" name="inside_hand_work"></label>
              </div>
              <div class="inputgroup">
                <label>内製費<input type="text" class="form_style input_w5" v-model="details[index].inside_insourcing_cost" name="inside_insourcing_cost"></label>
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <label><span class="spanwidth_1">社外内職</span><input type="text" class="form_style input_w10" v-model="details[index].outside_job1" name="outside_job1"></label>
              </div>
              <div class="inputgroup">
                <label>外注先<input type="text" class="form_style input_w10" v-model="details[index].outside_job1_outsou" name="outside_job1_outsou"></label>
              </div>
              <div class="inputgroup">
                <label>外注費<input type="text" class="form_style input_w5" v-model="details[index].outside_job1_outsou_cost" name="outside_job1_outsou_cost"><span class="txtcolor1">加算</span></label>
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <label><span class="spanwidth_1">社外内職</span><input type="text" class="form_style input_w10" v-model="details[index].outside_job2" name="outside_job2"></label>
              </div>
              <div class="inputgroup">
                <label>外注先<input type="text" class="form_style input_w10" v-model="details[index].outside_job2_outsou" name="outside_job2_outsou"></label>
              </div>
              <div class="inputgroup">
                <label>外注費<input type="text" class="form_style input_w5" v-model="details[index].outside_job2_outsou_cost" name="outside_job2_outsou_cost"><span class="txtcolor1">加算</span></label>
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <span id="sei_musen_tozi_mark" class="markzone mz_c2 v_hidden"></span>
                <button type="button" id="sei_musen_tozi_btn" @click="OnButtonClick01('sei_musen_tozi',5);">無線トジ</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_musen_tozi" name="sei_musen_tozi" id="sei_musen_tozi">
              </div>
              <div class="inputgroup">
                <button type="button" id="sei_musen_tozi_outsou_btn" @click="OutsourcingButton('sei_musen_tozi_outsou');">外注先</button>
                <input type="text" class="form_style input_w20" value="" v-model="details[index].sei_musen_tozi_outsou" name="sei_musen_tozi_outsou" id="sei_musen_tozi_outsou">
              </div>
              <div class="inputgroup">
                <label>外注費<input type="text" class="form_style input_w5" v-model="details[index].musen_tozi_outsou_cost" name="musen_tozi_outsou_cost"></label>
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <span id="sei_naka_tozi_mark" class="markzone mz_c2 v_hidden"></span>
                <button type="button" id="sei_naka_tozi_btn" @click="OnButtonClick01('sei_naka_tozi',5);">中トジ</button>
                <input type="text" class="input_w1"  v-model="details[index].sei_naka_tozi" name="sei_naka_tozi" id="sei_naka_tozi">
              </div>
              <div class="inputgroup">
                <button type="button" id="sei_naka_tozi_outsou_btn" @click="OutsourcingButton('sei_naka_tozi_outsou');">外注先</button>
                <input type="text" class="form_style input_w20" value="" v-model="details[index].sei_naka_tozi_outsou" name="sei_naka_tozi_outsou" id="sei_naka_tozi_outsou">
              </div>
              <div class="inputgroup">
                <label>外注費<input type="text" class="form_style input_w5" v-model="details[index].sei_naka_tozi_outsou_cost" name="sei_naka_tozi_outsou_cost"></label>
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <span id="sei_sashikomi_mark" class="markzone mz_c2 v_hidden"></span>
                <button type="button" id="sei_sashikomi_btn" @click="OnButtonClick('sei_sashikomi');">差込</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_sashikomi" name="sei_sashikomi" id="sei_sashikomi">
              </div>
              <div class="inputgroup">
                <button type="button" id="sei_sashikomi_outsou_btn" @click="OutsourcingButton('sei_sashikomi_outsou');">外注先</button>
                <input type="text" class="form_style input_w20" value="" v-model="details[index].sei_sashikomi_outsou" name="sei_sashikomi_outsou" id="sei_sashikomi_outsou">
              </div>
              <div class="inputgroup">
                <label>外注費<input type="text" class="form_style input_w5" v-model="details[index].sei_sashikomi_outsou_cost" name="sei_sashikomi_outsou_cost"></label>
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <label><input type="text" class="form_style input_w2" v-model="details[index].sei_ana" name="sei_ana">穴×</label>
                <label><input type="text" class="form_style input_w2" v-model="details[index].sei_part" name="sei_part">ヶ所</label>
              </div>
              <div class="inputgroup">
                <span id="sei_donko_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="sei_donko_btn" @click="OnButtonClick('sei_donko');">ドンコ</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_donko" name="sei_donko" id="sei_donko">
              </div>
              <div class="inputgroup">
                <span class="mgl20">折回数...</span>
                <label>横<input type="text" class="form_style input_w2" v-model="details[index].sei_ori_w" name="sei_ori_w">回</label>
                <label class="mgl10">縦<input type="text" class="form_style input_w2" v-model="details[index].sei_ori_h" name="sei_ori_h">回</label>
              </div>
            </div>

            <div class="group">
              <div class="inputgroup">
                <label><input type="text" class="form_style input_w5" v-model="details[index].sei_obi" name="sei_obi">帯</label>
              </div>
              <div class="inputgroup">
                <span id="sei_bara_mark" class="markzone mz_c4 v_hidden"></span>
                <button type="button" id="sei_bara_btn" @click="OnButtonClick01('sei_bara',6);">バラ</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_bara" name="sei_bara" id="sei_bara">
              </div>
              <div class="inputgroup">
                <span id="sei_oneset_mark" class="markzone mz_c4 v_hidden"></span>
                <button type="button" id="sei_oneset_btn" @click="OnButtonClick01('sei_oneset',6);">ワンセット</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_oneset" name="sei_oneset" id="sei_oneset">
              </div>
              <div class="inputgroup">
                <span id="sei_obake_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="sei_obake_btn" @click="OnButtonClick('sei_obake');">オバケ</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_obake" name="sei_obake" id="sei_obake">
              </div>
              <div class="inputgroup">
                <label class="mgl20">落とし
                <select name="sei_otoshi" class="form_style" v-model="details[index].sei_otoshi">
                <option value=""></option>
                <option value="コーナー">コーナー</option>
                <option value="角落とし">角落とし</option>
                <option value="角丸落とし">角丸落とし</option>
                </select>
                </label>
                <label><input type="text" class="form_style input_w2" v-model="details[index].sei_otoshi_part" name="sei_otoshi_part">ヶ所</label>
              </div>
            </div>
          </div><!--end area-->
        </div><!--end department01-->

        <div id="department01">
          <div class="cate2"><h4>標準</h4></div>
          <div class="area">
            <div class="group">
              <div class="inputgroup2">
                <label>梱装<input type="text" class="form_style input_w3" v-model="details[index].sei_package" name="sei_package">×</label>
                <label><input type="text" class="form_style input_w3" v-model="details[index].sei_package_num" name="sei_package_num">個、</label>
              </div>
              <div class="inputgroup2">
                <label>箱<input type="text" class="form_style input_w3" v-model="details[index].sei_box" name="sei_box">×</label>
                <label><input type="text" class="form_style input_w3" v-model="details[index].sei_box_num" name="sei_box_num">個</label>
              </div>
              <div class="inputgroup2">
                <span id="sei_a_system_mark" class="markzone mz_c5 v_hidden"></span>
                <button type="button" id="sei_a_system_btn" @click="OnButtonClick01('sei_a_system',7);">A式</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_a_system" name="sei_a_system" id="sei_a_system">
              </div>
              <div class="inputgroup2">
                <span id="sei_c_system_mark" class="markzone mz_c5 v_hidden"></span>
                <button type="button" id="sei_c_system_btn" @click="OnButtonClick01('sei_c_system',7);">C式</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_c_system" name="sei_c_system" id="sei_c_system">
              </div>
              <div class="inputgroup2">
                <span id="sei_vinyl_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="sei_vinyl_btn" @click="OnButtonClick('sei_vinyl');">ビニール</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].sei_vinyl" name="sei_vinyl" id="sei_vinyl">
              </div>
            </div>
          </div><!--end area-->
        </div><!--end department01-->

        <div id="department01">
          <div class="cate2"><h4>製本の全部</h4></div>
          <div class="area">
            <div class="group">
              <div class="inputgroup2">
                <button type="button" id="sei_all_outsou_btn" @click="OutsourcingButton('sei_all_outsou');">外注先</button>
                <input type="text" class="form_style input_w20" value="" v-model="details[index].sei_all_outsou" name="sei_all_outsou" id="sei_all_outsou">
              </div>
              <div class="inputgroup2">
                <label>外注費<input type="text" class="form_style input_w5" v-model="details[index].sei_all_outsou_cost" name="sei_all_outsou_cost"></label>
              </div>
            </div>
          </div><!--end area-->
        </div><!--end department01-->
      </div><!--end v-for-->



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
      <div v-show="outsourcingview === 'osv'">
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
  name: "Mmake",
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
    //this.login_user_code = this.authusers["code"];
    //this.login_user_role = this.authusers["role"];
    this.getItem();
    window.onload = () => {
      const timeout = '3000';
      setTimeout(() => {
        if(this.result) {
          console.log('setTimeout result in timeout -> ' + this.result + ' ' + timeout);
          //this.FirstExec();
        }
      }, timeout);
    };

  },
  methods: {
    // -------------------- イベント処理 --------------------
    FirstExec() {
      console.log('FirstExec in ');
      this.OnButtonClickTLoad('printing');
      this.OnButtonClick03Load('', 0, 'unit');
      //this.viewStrLen();
    },

    OnButtonClick(t) {
      var tm = t + '_mark';
      var inputid = document.getElementById(t);
      var inputvalue = inputid.value;
      var targetid = document.getElementById(tm);
      //console.log('OnButtonClick -> t= ' + t + ' inputvalue= ' + inputvalue);
      
      if (inputvalue == "1") { 
        targetid.style.visibility = "hidden";
        //inputid.value = "0";
        this.$set(this.details[0], t, 0);
      }
      else {
        targetid.style.visibility = "visible";
        //inputid.value = "1";
        this.$set(this.details[0], t, 1);
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
        //inputid.value = "1";
        this.$set(this.details[0], t, 1);
        btnid.innerHTML = "断裁・一般";
      }
      else if (inputvalue == "1") {
        targetid.style.visibility = "visible";
        //inputid.value = "2";
        this.$set(this.details[0], t, 2);
        btnid.innerHTML = "断裁・インサータ";
      }
      else if (inputvalue == "2") {
        targetid.style.visibility = "hidden";
        //inputid.value = "0";
        this.$set(this.details[0], t, 0);
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
            //inputid.value = "0";
            this.$set(this.details[0], n, 0);
          }
          else if (inputvalue == "0") {
            targetid.style.visibility = "visible";
            //inputid.value = "1";
            this.$set(this.details[0], n, 1);
          }
        }
        else {
          targetid.style.visibility = "hidden";
          //inputid.value = "0";
          this.$set(this.details[0], n, 0);
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
      //this.event.value = param1;
      
      //var target_inputid = document.getElementById(event);
      //target_inputid.value = param1;

      //配列の変更を即座に反映するには「Vue.set」または「vm.$set(this.$set)」関数が必要
      //this.details[0].event = param1;　これでは反映されない。
      this.$set(this.details[0], event, param1);

      this.outsourcingview = false;
      console.log('selectOS event = ' + event + ': param1 = ' + param1);

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
      this.outsourcingview = 'osv';
      console.log('OutsourcingButton 引数 = ' + t);



    },


    // -------------------- サーバー処理 --------------------
    // 見積を取得
    getItem: function() {
      console.log('getItem in props s_m_code = ' + this.s_m_code);
      var motion_msg = "見積 ー 製本取得";
      var arrayParams = { 
        s_m_code : this.s_m_code , 

      };
      this.postRequest("/quotations/binding/get", arrayParams)
        .then(response  => {
          this.getThen(response, motion_msg);
        })
        .catch(reason => {
          this.serverCatch("quotationsBinding取得");
        });

    },


    // -------------------- 共通 --------------------

    // 取得正常処理
    getThen(response, eventtext) {
      var messages = [];
      var res = response.data;
      if (res.details.length > 0) {
          this.details = res.details;
          this.select_arr_s001 = res.select_arr_s001;
          this.select_arr_s002 = res.select_arr_s002;
          this.select_arr_s003 = res.select_arr_s003;
          this.select_arr_s004 = res.select_arr_s004;
          this.select_arr_s005 = res.select_arr_s005;

          this.event_title = res.s_m_code;
          //console.log("putThenSearch in res.s_m_code = " + res.s_m_code);
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

    // 異常処理
    serverCatch(eventtext) {
      console.log('処理未完 -> ' + eventtext);
    },
  }
};
</script>
