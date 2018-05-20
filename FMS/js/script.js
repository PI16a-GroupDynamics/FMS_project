function MkHouseValues(index, name){
	var aCurrHouseValues=document.forms[name].elements["countries"].value.split(",");
    var nCurrHouseValuesCnt = aCurrHouseValues.length;
    var oHouseList = document.forms[name].elements["cities"];
    var oHouseListOptionsCnt = oHouseList.options.length;
    oHouseList.length = 0; // удаляем все элементы из списка домов
    for (i = 0; i < nCurrHouseValuesCnt-1; i++){
        // далее мы добавляем необходимые дома в список
        if (document.createElement){
            var newHouseListOption = document.createElement("OPTION");
            newHouseListOption.text = aCurrHouseValues[i];
            newHouseListOption.value = aCurrHouseValues[i];
            // тут мы используем для добавления элемента либо метод IE, либо DOM, которые, alas, не совпадают по параметрам…
            (oHouseList.options.add) ? oHouseList.options.add(newHouseListOption) : oHouseList.add(newHouseListOption, null);
        }else{
            // для NN3.x-4.x
            oHouseList.options[i] = new Option(aCurrHouseValues[i], aCurrHouseValues[i], false, false);
        }
    }
}