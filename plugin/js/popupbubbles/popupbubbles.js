/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    var toolstips_status = false;
    $('a[rel=ws_toolstips]').mouseenter(function () {
        
        var id_tips = $(this).attr('href');
        var id_viewer = id_tips.split('#');
        var content = $(id_tips).html();
        var opset = $(this).position();
        var tips_title = $(this).attr('title');
            
        var frame;
            frame  = "<div id='frame_out'>";
            frame += "  <div id='frame_body'>";
            frame += "      <div id='frame_header'>";
            frame += "          <div id='tips_title'>";
            frame +=                tips_title;
            frame += "          </div>";
            frame += "          <div id='tips_close'>x</div>";
            frame += "      </div>";
            frame += "      <div id='frame_content'>";
            frame +=            content;
            frame += "      </div>";
            frame += "  </div>";
            frame += "  <div id='frame_bottom'></div>";
            frame += "</div>";
            
        if (!toolstips_status){
            $('#viewtips_'+id_viewer[1]).children('div#frame_out').remove();
            $('#viewtips_'+id_viewer[1]).append(frame);

            var frame_height = $('#frame_out').height();
            $('#frame_out').css({'top':opset.top-(frame_height+4),'left':opset.left}).fadeIn('slow');
            
            toolstips_status = true;
            
            $('#tips_close').click(function(){
                $('div#frame_out').fadeOut('slow',function(){
                    $('#viewtips_'+id_viewer[1]).children(this).remove();
                });
                toolstips_status = false;
            });
        }
        
        
        //return false;
    }).mouseout(function () {
        //$(this).delay(2000).queue(function(){
            //$(this).children('div#frame_out').remove()
        //});
        //return false;
    });
    
    
});