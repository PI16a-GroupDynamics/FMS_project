<div id="left_menu_container" class="col-4" style="">

<a href="add.php" id="left_menu_add" class="btn btn-outline-dark col p-2 mb-3">Добавить<img src="images/left_menu_plus.png" alt="err" class=""></a>
<script>//скрипт динамического изменения городов при выборе страны
function MkHouseValues(index, name){
  var aCurrHouseValues=document.forms[name].elements["countries"].value.split(",");
    var nCurrHouseValuesCnt = aCurrHouseValues.length;
    var oHouseList = document.forms[name].elements["cities"];
    var oHouseListOptionsCnt = oHouseList.options.length;
    oHouseList.length = 0;
    for (i = 0; i < nCurrHouseValuesCnt-1; i+=2){
        if (document.createElement){
            var newHouseListOption = document.createElement("OPTION");
            newHouseListOption.text = aCurrHouseValues[i+1];
            newHouseListOption.value = aCurrHouseValues[i];
            (oHouseList.options.add) ? oHouseList.options.add(newHouseListOption) : oHouseList.add(newHouseListOption, null);
        }else{
            oHouseList.options[i] = new Option(aCurrHouseValues[i+1], aCurrHouseValues[i], false, false);
        }
    }
}
</script>
<form name="sort" method="POST">

<div class="input-group mb-3">
  <input type="text" name="Search_text" class="form-control border-dark" placeholder="Поиск">
  <div class="input-group-append">
    <button type="submit" name="Search" class="btn btn-outline-dark" type="button"><img src="images/left_menu_monotone_search_zoom.png" alt="err"></button>
  </div>
</div>
<div class="input-group mb-3 rounded border border-dark">
<p id="left_menu_sort_name" class="col text-center mt-1 mb-3">Сортировка</p>
<div class="input-group mb-3">
<p class="col-3 mb-3">Пол:</p>
<div class="input-group col">
<div class="form-check form-check-inline mb-3">
  <input class="form-check-input" name="M" type="checkbox" id="left_menu_sex_m" value="1">
  <label class="form-check-label" for="left_menu_sex_m">Мужской</label>
</div>
<div class="form-check form-check-inline mb-3">
  <input class="form-check-input" name="W" type="checkbox" id="left_menu_sex_w" value="0">
  <label class="form-check-label" for="left_menu_sex_w">Женский</label>
</div>
</div>
</div>

<div class="input-group mb-3">
<p id="left_menu_age_name" class="col-4 align-center mt-2">Возраст:</p>
<input type="number" name ="old" class="form-control rounded col-md-3 offset-md-1 mb-1  border-dark">
</div>
<div class="input-group mb-3">
<p class="col-4 align-center mt-2">Страна:</p>
<select name="countries" onchange="MkHouseValues(this.selectedIndex,'sort')" id="country_id"  class="form-control  rounded border-dark col-md-6 offset-md-1">
	<option value="0,Не выбирать"> Не выбирать</option>
	 <?php $result = mysqli_query($link,"SELECT * FROM `countries`");//вывод стран
	 $a=0;
	 while(($row=mysqli_fetch_array($result))!=null){
	 	if ($a==0)
	 		$a=$row[0];
	 	$result1 = mysqli_query($link,"SELECT * FROM `cities` WHERE country_id=".$row[0]);
	 	 while(($row1=mysqli_fetch_array($result1))!=null)
	 	 	$w.=$row1[0].",".$row1[1].",";
	 	echo "<option value=".$w.">".$row[1]."</option>";
	 	$w="";
	 }
	 ?>
</select>
</div>
<div class="input-group mb-3">
<p class="col-4 align-center mt-2">Город:</p>
<select name="cities"" class="form-control rounded border-dark col-md-6 offset-md-1">
	<option value="0"> Не выбирать</option>

</select>
</div>
<button type="submit" name="Sorted" class="btn btn-outline-dark col-md-6 offset-md-3 mb-3">Сортировать</button>
</div>

</form>
<a href="#" id="left_menu_log" class="btn btn-outline-dark col p-2 mb-3">Лог посещений<img src="images/left_menu_log.png" alt="err" class=""></a>
<a href="#" id="left_menu_guide" class="btn btn-outline-dark col p-2 mb-3">Справка <img src="images/left_menu_guide.png" alt="err" class="ml-1"></a>
</div>