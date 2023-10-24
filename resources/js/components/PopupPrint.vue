<template>
  <div>
      <div id="cnt2">
          <h3 class="">{{ printTitle }}</h3>
          <!--<div>this is PopupPrintvue {{ mCode }}</div>-->
          <!--<div>{{ RePrintData }}</div>-->
          <!--<input type="text" v-bind:value="mCode">-->

          <!--<div id="pdatazone" v-html="RePrintData"></div>-->
          

            <div v-for="(item,rowIndex) in details" :key="rowIndex">
              <div>
                <div>popupprint.vue details {{ rowIndex }}</div>
                <div>customer -> {{ item['customer'] }}</div>
                <div>enduser -> {{ item['enduser'] }}</div>
                <div>product -> {{ item['product'] }}</div>
              </div>
            </div>

            <hr>


          
            <div v-for="(pitem,prowIndex) in details_parts" >
              <div>
                <div>popupprint.vue details_parts {{ prowIndex }}</div>
                <div>paper_name -> {{ pitem['paper_name'] }}</div>
                <div>size_w -> {{ pitem['size_w'] }}</div>
                <div>soze_h -> {{ pitem['size_h'] }}</div>
              </div>
            </div>


            <hr>


            <div v-for="(item,rowIndex) in details">
              <div>
                <div>popupprint.vue details {{ rowIndex }}</div>
                <div>paper_amount -> {{ item['paper_amount'] }}</div>
                <div>wages_amount -> {{ item['wages_amount'] }}</div>
                <div>cost_amount -> {{ item['cost_amount'] }}</div>
              </div>
            </div>



          <div id="print_btnzone" class="print-none">
            <button type='button' onclick='window.print(); return false;'>印刷</button>
            <button type='button' @click="cancelClickBtn();">閉じる</button>
          </div>
      </div>
  </div>
</template>
<script>
import { dialogable } from "../mixins/dialogable.js";
import { checkable } from "../mixins/checkable.js";
import { requestable } from "../mixins/requestable.js";

export default {
  name: "PopupPrint",
  mixins: [dialogable, checkable, requestable],
  props: {
    mCode: {
      type:  String,
      default: ""
    },
    printData: {
      type:  String,
      default: ""
    },
    printTitle: {
      type:  String,
      default: ""
    },

  },
  data: function() {
    return {
      details: [],
      details_parts: [],
      pagename: "",
      RePrintData: "",
      event_title: "",
      actionmsgArr: [],
      select_arr_s001: [],
      select_arr_s002: [],
      select_arr_s003: [],
      select_arr_s004: [],
      select_arr_s005: [],

    };
  },
  mounted() {
    this.getItem();
    this.getParts();
    this.ReplacePrintData();
  },
  methods: {
    // -------------------- イベント処理 --------------------
    cancelClickBtn() {
      this.$emit('pricancel-event',event);
      console.log('cancelClickBtn PopupPrint.vue 閉じるボタン押下 = ' + this.pageName);

    },
    // -------------------- サーバー処理 ----------------------------
    // 見積情報を取得
    getItem: function() {

      var motion_msg = "見積取得";
      var arrayParams = { 
        s_m_code : this.mCode , 

      };
      this.postRequest("/qsearch/get", arrayParams)
        .then(response  => {
          this.putThenSearch(response, motion_msg);
        })
        .catch(reason => {
          this.serverCatch("getItem取得");
        });






        /*
      var arrayParams = { 
        m_code: this.mCode
      };
      this.postRequest("/print_q/get", arrayParams)
        .then(response  => {
          this.getThen(response);
        })
        .catch(reason => {
          this.serverCatch("取得");
        });
        */




    },
    getParts: function() {
      var motion_msg = "popupprint getparts";
          var arrayParams = { 
            s_m_code : this.mCode , 

          };
          this.postRequest("/qparts/get", arrayParams)
            .then(response  => {
              this.putThenParts(response, motion_msg);
            })
            .catch(reason => {
              this.serverCatch("popupパーツget");
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
          this.details_parts = res.details_parts;
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
      } else {
          //this.actionmsgArr.push(this.s_m_code + " が見つかりませんでした。");
          this.details = [];
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("警告", res.messagedata, "warning", true, false);
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
      console.log('異常処理');
    },
    // 置換
    ReplacePrintData() {
      let str = this.printData;
      this.RePrintData = str.replace(/\n/g, '<br>');
    }

  },

}
</script>
<style>
.app  {color:red;}
</style>
