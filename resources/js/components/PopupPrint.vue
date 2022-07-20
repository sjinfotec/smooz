<template>
  <div>
      <div id="cnt2">
          <h3 class="">{{ printTitle }}</h3>
          <!--<div>this is PopupPrintvue {{ mCode }}</div>-->
          <!--<div>{{ RePrintData }}</div>-->
          <!--<input type="text" v-bind:value="mCode">-->
          <div id="pdatazone" v-html="RePrintData"></div>

          <div id="print_btnzone" class="print-none">
            <button type='button' onclick='window.print(); return false;'>印刷</button>
            <button type='button' @click="cancelClickBtn();">閉じる</button>
          </div>
      </div>
  </div>
</template>
<script>
export default {
  name: "Base",
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
      pagename: "",
      RePrintData: "",

    };
  },
  mounted() {
    //this.getItem();
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
      var arrayParams = { 
        m_code: mCode
      };
      this.postRequest("/print_q/get", arrayParams)
        .then(response  => {
          this.getThen(response);
        })
        .catch(reason => {
          this.serverCatch("取得");
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
