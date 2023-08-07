<template>
  <div>
    <div>
      <h3>見積作成</h3>
    </div>
    <div id="cnt1" >
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
      <div class="line">
        <div class="inputgroup">
          <label>担当者<input type="text" class="form_style" name="manager"><span></span></label>
        </div>
        <div class="inputgroup">
          <label>得意先<input type="text" class="form_style" name="customer_code"><input type="text" class="form_style" name="customer"></label>
        </div>
      </div>
      <div class="line">
        <div class="inputgroup">
          <label>エンドユーザー<input type="text" class="form_style input_w30" name="enduser"></label>
        </div>
      </div>
      <div class="line">
        <div class="inputgroup">
          <label>製品名<input type="text" class="form_style input_w30" name="product"></label>
        </div>
      </div>
      <div class="line">
        <div class="inputgroup">
          <label><input type="text" class="form_style input_w2" name="page_num">P</label>
        </div>
        <div class="inputgroup">
          <label>制作組数<input type="text" class="form_style input_w5" name="production_setnum">
          <select name="production_setnum_unit" class="form_style">
          <option value=""></option>
          <option value="組">組</option>
          <option value="帯">帯</option>
          </select>
          </label>
        </div>
        <div class="inputgroup">
          <label>制作冊数<input type="text" class="form_style input_w5" name="production_volnum">
          <select name="production_volnum_unit" class="form_style">
          <option value=""></option>
          <option value="S">S</option>
          <option value="冊">冊</option>
          <option value="束">束</option>
          <option value="箱">箱</option>
          <option value="枚">枚</option>
          <option value="部">部</option>
          <option value="個">個</option>
          </select>
          </label>
        </div>
        <div class="inputgroup">
          <span id="printing_mark" class="markzone mz_c1"></span>
          <button type="button" id="printing_btn" @click="OnButtonClickT('printing');">印刷有り</button>
          <input type="text" class="input_w1" value="1" name="printing" id="printing">
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
          <input type="text" class="input_w1" value="0" name="unit" id="unit">
        </div>
        <div class="inputgroup">
          <label>紙取<input type="text" class="form_style input_w2" name="papertray">切</label>
        </div>
        <div class="inputgroup">
          面付け...
          <label>横<input type="text" class="form_style input_w2" name="imposition_w"></label>
          ×
          <label>縦<input type="text" class="form_style input_w2" name="imposition_h"></label>
        </div>
      </div>
      <div class="line">
        <div class="inputgroup">
          <label>シリンダー
          <select name="cylinder" class="form_style">
          <option value=""></option>
          <option value="10">10</option>
          <option value="10.5">10.5</option>
          <option value="11">11</option>
          <option value="11.5">11.5</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="13.5">13.5</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          </select>
          </label>
          <label><input type="text" class="form_style input_w2" name="cylinder_num">本</label>
        </div>
        <div class="inputgroup">
          サイズ...
          <label>横<input type="text" class="form_style input_w3" name="size_w"></label>
          ×
          <label>縦<input type="text" class="form_style input_w3" name="size_h"></label>
          <input type="text" class="form_style input_w2" name="size_top">/<input type="text" class="form_style input_w2" name="size_bottom">
          <label>
          <select name="inch_fold" class="form_style">
          <option value=""></option>
          <option value="4">4</option>
          <option value="4.5">4.5</option>
          <option value="5">5</option>
          <option value="5.5">5.5</option>
          <option value="6">6</option>
          <option value="6.5">6.5</option>
          <option value="7">7</option>
          <option value="7.5">7.5</option>
          <option value="8">8</option>
          <option value="8.5">8.5</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="10.5">10.5</option>
          <option value="11">11</option>
          <option value="11.5">11.5</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="13.5">13.5</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
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
            <div class="inputgroup">
              <button type="button" id="form_all_outsou_btn" @click="OutsourcingButton('form_all_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="form_all_outsou" id="form_all_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="form_all_outsou_cost"></label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div id="department01">
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

      <div id="department01">
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

      <div id="department01">
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
            <div class="inputgroup">
              <button type="button" id="collator_all_outsou_btn" @click="OutsourcingButton('collator_all_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="collator_all_outsou" id="collator_all_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="collator_all_outsou_cost"></label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div id="department01">
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


      <div id="department01">
        <div class="cate"><h4 class="lspacing1">製本</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <span id="sei_chouai_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="sei_chouai_btn" @click="OnButtonClick('sei_chouai');">丁合</button>
              <input type="text" class="input_w1" value="0" name="sei_chouai" id="sei_chouai">
            </div>
            <div class="inputgroup">
              <button type="button" id="sei_chouai_outsou_btn" @click="OutsourcingButton('sei_chouai_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="sei_chouai_outsou" id="sei_chouai_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="sei_chouai_outsou_cost"></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span id="sei_dansai_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="sei_dansai_btn" @click="OnButtonClickD('sei_dansai');">断裁</button>
              <input type="text" class="input_w1" value="0" name="sei_dansai" id="sei_dansai">
            </div>
            <div class="inputgroup">
              <button type="button" id="sei_dansai_outsou_btn" @click="OutsourcingButton('sei_dansai_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="sei_dansai_outsou" id="sei_dansai_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="sei_dansai_outsou_cost"></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span id="sei_marble_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="sei_marble_btn" @click="OnButtonClick01('sei_marble',3);">マーブル</button>
              <input type="text" class="input_w1" value="0" name="sei_marble" id="sei_marble">
            </div>
            <div class="inputgroup">
              <span id="sei_cross_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="sei_cross_btn" @click="OnButtonClick01('sei_cross',3);">クロス</button>
              <input type="text" class="input_w1" value="0" name="sei_cross" id="sei_cross">
            </div>
            <div class="inputgroup">
              <span id="sei_mat_maki_cardboard_mark" class="markzone mz_c3 v_hidden"></span>
              <button type="button" id="sei_mat_maki_cardboard_btn" @click="OnButtonClick01('sei_mat_maki_cardboard',4);">下敷巻ボール</button>
              <input type="text" class="input_w1" value="0" name="sei_mat_maki_cardboard" id="sei_mat_maki_cardboard">
            </div>
            <div class="inputgroup">
              <span id="sei_mat_cardboard_mark" class="markzone mz_c3 v_hidden"></span>
              <button type="button" id="sei_mat_cardboard_btn" @click="OnButtonClick01('sei_mat_cardboard',4);">下敷ボール</button>
              <input type="text" class="input_w1" value="0" name="sei_mat_cardboard" id="sei_mat_cardboard">
            </div>
            <div class="inputgroup">
              <label class="mgl20">
              <select name="sei_nori" class="form_style">
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
              <select name="sei_tsuduri" class="form_style">
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
              <input type="text" class="input_w1" value="0" name="sei_kurumi" id="sei_kurumi">
            </div>
            <div class="inputgroup">
              <label class="mgl20">ラミネート
              <select name="sei_laminate" class="form_style">
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
              <label><input type="text" class="form_style input_w2" name="sei_laminate_through">通し</label>
            </div>
             <div class="inputgroup">
              <span id="sei_buster_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="sei_buster_btn" @click="OnButtonClick('sei_buster');">バスター</button>
              <input type="text" class="input_w1" value="0" name="sei_buster" id="sei_buster">
            </div>
            <div class="inputgroup">
              <span id="sei_crimping_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="sei_crimping_btn" @click="OnButtonClick('sei_crimping');">圧着</button>
              <input type="text" class="input_w1" value="0" name="sei_crimping" id="sei_crimping">
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label><span class="spanwidth_1">手作業</span><input type="text" class="form_style input_w30" name="inside_hand_work"></label>
            </div>
            <div class="inputgroup">
              <label>内製費<input type="text" class="form_style input_w5" name="inside_insourcing_cost"></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label><span class="spanwidth_1">社外内職</span><input type="text" class="form_style input_w10" name="outside_job1"></label>
            </div>
            <div class="inputgroup">
              <label>外注先<input type="text" class="form_style input_w10" name="outside_job1_outsou"></label>
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="outside_job1_outsou_cost"><span class="txtcolor1">加算</span></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label><span class="spanwidth_1">社外内職</span><input type="text" class="form_style input_w10" name="outside_job2"></label>
            </div>
            <div class="inputgroup">
              <label>外注先<input type="text" class="form_style input_w10" name="outside_job2_outsou"></label>
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="outside_job2_outsou_cost"><span class="txtcolor1">加算</span></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span id="sei_musen_tozi_mark" class="markzone mz_c2 v_hidden"></span>
              <button type="button" id="sei_musen_tozi_btn" @click="OnButtonClick01('sei_musen_tozi',5);">無線トジ</button>
              <input type="text" class="input_w1" value="0" name="sei_musen_tozi" id="sei_musen_tozi">
            </div>
            <div class="inputgroup">
              <button type="button" id="sei_musen_tozi_outsou_btn" @click="OutsourcingButton('sei_musen_tozi_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="sei_musen_tozi_outsou" id="sei_musen_tozi_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="musen_tozi_outsou_cost"></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span id="sei_naka_tozi_mark" class="markzone mz_c2 v_hidden"></span>
              <button type="button" id="sei_naka_tozi_btn" @click="OnButtonClick01('sei_naka_tozi',5);">中トジ</button>
              <input type="text" class="input_w1" value="0" name="sei_naka_tozi" id="sei_naka_tozi">
            </div>
            <div class="inputgroup">
              <button type="button" id="sei_naka_tozi_outsou_btn" @click="OutsourcingButton('sei_naka_tozi_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="sei_naka_tozi_outsou" id="sei_naka_tozi_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="sei_naka_tozi_outsou_cost"></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span id="sei_sashikomi_mark" class="markzone mz_c2 v_hidden"></span>
              <button type="button" id="sei_sashikomi_btn" @click="OnButtonClick('sei_sashikomi');">差込</button>
              <input type="text" class="input_w1" value="0" name="sei_sashikomi" id="sei_sashikomi">
            </div>
            <div class="inputgroup">
              <button type="button" id="sei_sashikomi_outsou_btn" @click="OutsourcingButton('sei_sashikomi_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="sei_sashikomi_outsou" id="sei_sashikomi_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="sei_sashikomi_outsou_cost"></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="sei_ana">穴×</label>
              <label><input type="text" class="form_style input_w2" name="sei_part">ヶ所</label>
            </div>
            <div class="inputgroup">
              <span id="sei_donko_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="sei_donko_btn" @click="OnButtonClick('sei_donko');">ドンコ</button>
              <input type="text" class="input_w1" value="0" name="sei_donko" id="sei_donko">
            </div>
            <div class="inputgroup">
              <span class="mgl20">折回数...</span>
              <label>横<input type="text" class="form_style input_w2" name="sei_ori_w">回</label>
              <label class="mgl10">縦<input type="text" class="form_style input_w2" name="sei_ori_h">回</label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w5" name="sei_obi">帯</label>
            </div>
            <div class="inputgroup">
              <span id="sei_bara_mark" class="markzone mz_c4 v_hidden"></span>
              <button type="button" id="sei_bara_btn" @click="OnButtonClick01('sei_bara',6);">バラ</button>
              <input type="text" class="input_w1" value="0" name="sei_bara" id="sei_bara">
            </div>
            <div class="inputgroup">
              <span id="sei_oneset_mark" class="markzone mz_c4 v_hidden"></span>
              <button type="button" id="sei_oneset_btn" @click="OnButtonClick01('sei_oneset',6);">ワンセット</button>
              <input type="text" class="input_w1" value="0" name="sei_oneset" id="sei_oneset">
            </div>
            <div class="inputgroup">
              <span id="sei_obake_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="sei_obake_btn" @click="OnButtonClick('sei_obake');">オバケ</button>
              <input type="text" class="input_w1" value="0" name="sei_obake" id="sei_obake">
            </div>
            <div class="inputgroup">
              <label class="mgl20">落とし
              <select name="sei_otoshi" class="form_style">
              <option value=""></option>
              <option value="コーナー">コーナー</option>
              <option value="角落とし">角落とし</option>
              <option value="角丸落とし">角丸落とし</option>
              </select>
              </label>
              <label><input type="text" class="form_style input_w2" name="sei_otoshi_part">ヶ所</label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div id="department01">
        <div class="cate3"><h4>標準</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <label>梱装<input type="text" class="form_style input_w3" name="sei_package">×</label>
              <label><input type="text" class="form_style input_w3" name="sei_package_num">個、</label>
            </div>
            <div class="inputgroup">
              <label>箱<input type="text" class="form_style input_w3" name="sei_box">×</label>
              <label><input type="text" class="form_style input_w3" name="sei_box_num">個</label>
            </div>
            <div class="inputgroup">
              <span id="sei_a_system_mark" class="markzone mz_c5 v_hidden"></span>
              <button type="button" id="sei_a_system_btn" @click="OnButtonClick01('sei_a_system',7);">A式</button>
              <input type="text" class="input_w1" value="0" name="sei_a_system" id="sei_a_system">
            </div>
            <div class="inputgroup">
              <span id="sei_c_system_mark" class="markzone mz_c5 v_hidden"></span>
              <button type="button" id="sei_c_system_btn" @click="OnButtonClick01('sei_c_system',7);">C式</button>
              <input type="text" class="input_w1" value="0" name="sei_c_system" id="sei_c_system">
            </div>
            <div class="inputgroup">
              <span id="sei_vinyl_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" id="sei_vinyl_btn" @click="OnButtonClick('sei_vinyl');">ビニール</button>
              <input type="text" class="input_w1" value="0" name="sei_vinyl" id="sei_vinyl">
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->

      <div id="department01">
        <div class="cate2"><h4>製本の全部</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <button type="button" id="sei_all_outsou_btn" @click="OutsourcingButton('sei_all_outsou');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="sei_all_outsou" id="sei_all_outsou">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="sei_all_outsou_cost"></label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->


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


      <div id="department01">
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
            <div class="inputgroup">
              <button type="button" id="product_all_outsou1_btn" @click="OutsourcingButton('product_all_outsou1');">外注先</button>
              <input type="text" class="form_style input_w20" value="" name="product_all_outsou1" id="product_all_outsou1">
            </div>
            <div class="inputgroup">
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

      <div id="department01">
        <div class="cate"></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <label><span class="spanwidth_1">コメント</span><input type="text" class="form_style input_w40" name="comment"></label>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->


      <div class="line">
          <div id="zukei" class="mglrauto">
            <div class="yajirushi_1"></div>
          </div>
      </div>
      <div class="line">
          <div class="mglrauto">
            <button type="button" id="setcal_btn" @click="SetcalBtn();">設定・計算</button>
          </div>
      </div>


      <div id="department01">
        <div class="cate"></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <label><span class="spanwidth_1">提示額</span><input type="text" class="form_style input_w5" name="offered_price"></label>
            </div>
            <div class="inputgroup">
              <button type="button" id="cost_btn" @click="CostBtn();">原価一覧</button>
            </div>
          </div>
        </div><!--end area-->
      </div><!--end department01-->


      <div id="calculation">
        <h3>計算結果</h3>
        <div class="inputgroup">
        </div>
      </div>

    </div><!--end id cnt1-->

    <div id="partszone" v-if="partsview == true">
      <mit-parts
       v-bind:page-num="pagenum"
       v-bind:page-name="pagename"
       v-on:pcancel-event="Pcancel"
      ></mit-parts>
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
