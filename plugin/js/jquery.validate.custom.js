/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery.validator.addMethod("largerDateFrom", function(value, element, param) {
    var temp1 = $(param).val(); 
    var temp2 = value;
    
    var val1 = new Date(temp1);
    var val2 = new Date(temp2);
    
    return this.optional(element) || val2 >= val1;
}, "Incorect date.");

jQuery.validator.addMethod("smallerDateFrom", function(value, element, param) {
    var temp1 = $(param).val(); 
    var temp2 = value;
    
    var val1 = new Date(temp1);
    var val2 = new Date(temp2);
    
    return this.optional(element) || val2 >= val1;
}, "Incorect date.");
