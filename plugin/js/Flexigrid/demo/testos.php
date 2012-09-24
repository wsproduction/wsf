<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Flexigrid</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" type="text/css" href="../css/flexigrid.pack.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="../js/flexigrid.pack.js"></script> 

    </head>
    <body>
        <table class="flexme3" style="display: none"></table>

        <script type="text/javascript">
            $(".flexme3").flexigrid({
                url : 'post-xml.php',
                dataType : 'xml',
                colModel : [ {
                        display : 'ISO',
                        name : 'iso',
                        width : 40,
                        sortable : true,
                        align : 'center'
                    }, {
                        display : 'Name',
                        name : 'name',
                        width : 180,
                        sortable : true,
                        align : 'left'
                    }, {
                        display : 'Printable Name',
                        name : 'printable_name',
                        width : 120,
                        sortable : true,
                        align : 'left'
                    }, {
                        display : 'ISO3',
                        name : 'iso3',
                        width : 130,
                        sortable : true,
                        align : 'left',
                        hide : true
                    }, {
                        display : 'Number Code',
                        name : 'numcode',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    } ],
                buttons : [ {
                        name : 'Add',
                        bclass : 'add',
                        onpress : test
                    }, {
                        name : 'Delete',
                        bclass : 'delete',
                        onpress : test
                    }, {
                        separator : true
                    } ],
                searchitems : [ {
                        display : 'ISO',
                        name : 'iso'
                    }, {
                        display : 'Name',
                        name : 'name',
                        isdefault : true
                    } ],
                sortname : "iso",
                sortorder : "asc",
                usepager : true,
                title : 'Countries',
                useRp : true,
                rp : 15,
                showTableToggleBtn : true,
                width : 700,
                height : 200
            });

            function test(com, grid) {
                if (com == 'Delete') {
                    confirm('Delete ' + $('.trSelected', grid).length + ' items?')
                } else if (com == 'Add') {
                    alert('Add New Item');
                }
            }
        </script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-3875581-2']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
    </body>
</html>
