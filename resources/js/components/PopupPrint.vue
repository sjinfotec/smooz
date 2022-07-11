<template>
  <div>
      <div id="tips_cnt">
          <h3 class="">見積内容</h3>
          <div>this is PopupPrintvue</div>
          <div>{{ printData }}</div>
          <div v-bind:value="pageName"></div>
      </div>
  </div>
</template>
<script>
export default {
  name: "Base",
  props: {
    pageName: {
      type:  String,
      default: ""
    },
    printData: {
      type:  String,
      default: ""
    }
  },
  data: function() {
    return {
      details: [],
      pagename: "",

    };
  },

}
</script>
<style>
.app  {color:red;}
</style>
