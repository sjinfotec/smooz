<template>
  <div>
    <!--
    <div>
      <h3>外注先 選択 － －</h3>
    </div>
    -->
    <div id="cnt_os">
      <div class="line">
        <div class="inputgroup">
          <button type="button" id="p_cancel_btn" @click="cancelClickBtn();">キャンセル</button>
        </div>
      </div>
    </div><!-- end cnt1 -->
    <div id="cnt_os">
      <div class="outsourcing_block flex_jc_sb">
                    <div v-for="(item,rowIndex) in details" :key="rowIndex">
                    <button type="button" id="" @click="SelectOsBtn(item['name']);">{{ item['name'] }}</button>
                    </div>

      </div>
    </div>
    <div id="cnt_os">
      <div class="line flex_jc_r">
        <div class="inputgroup">
          <button type="button" id="p_cancel_btn" @click="cancelClickBtn();">キャンセル</button>
        </div>
      </div>
    </div><!-- end cnt1 -->

  </div>
</template>

<script>
//import { requestable } from "../mixins/requestable.js";
export default {
  name: 'Outsourcing',
  //mixins: [dialogable, checkable, requestable],
  props: {
    inputTextid: {
      type:  String,
      default: ""
    },
  },
  data() {
    return {
      details: [],
      pagename: "",
      inputtextid: "",

    };
  },
  // マウント時
  mounted() {
    //this.Test();
    this.getItem();

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
    cancelClickBtn() {
      this.$emit('oscancel-event',event);
      console.log('cancelClickBtn Outsourcing.vue キャンセルボタン押下');

    },
    SelectOsBtn(ival) {
      var event = this.inputTextid;
      var param1 = ival;
      this.$emit('selectos-event', event, param1);
      console.log('SelectOsBtn inputTextid = ' + this.inputTextid);

    },

    // ------------------------ サーバー処理 ----------------------------
    // 取得処理
    getItem() {
      //this.inputClear();
      //console.log("getitem in");
      var arrayParams = { 
        };
      axios.post("/outsourcing/get", arrayParams)
        .then(response  => {
          this.getThen(response);
        })
        .catch(reason => {
          this.serverCatch("取得");
        });
    },
 

    Test(){
      console.log('Outsourcing.vue 出力')
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


  }
};
</script>
