/**
 * Created by Стаислав on 24.04.2016.
 */

function apiModifyTable(originalData,id,response){
    angular.forEach(originalData, function (item,key) {
        if(item.id == id){
            originalData[key] = response;
        }
    });
    return originalData;
}