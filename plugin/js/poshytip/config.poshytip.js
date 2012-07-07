/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function form_tips(id){
    $('#' + id).poshytip({
        className: 'tip-twitter',
        showOn: 'focus',
        alignTo: 'target',
        alignX: 'right',
        alignY: 'center',
        offsetX: 5
    });
}


