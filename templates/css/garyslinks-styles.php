<style>
    .gl-row {
        width: 98%;
        clear: both;
        position: relative;
        margin: 10px;
    }

    .gl-pull-left {
        float: left;
    }

    .gl-pull-right {
        float: right;
    }

    .gl-col-long {
        padding: 5px;
        width: 75%;
    }

    .gl-col-sm {
        padding: 5px;
        width: 25%;
    }

    .gl-clear-fix {
        clear: both;
    }
    #gl-menu{
        text-align: center;
    }


    #gl-menu ul {
        list-style: none;
        background-color: #444;
        text-align: center;
        padding: 0;
        margin: 0;
    }
    #gl-menu li {
        font-family: 'Oswald', sans-serif;
        font-size: 1.2em;
        line-height: 40px;
        height: 40px;
        border-bottom: 1px solid #888;
    }

    #gl-menu a {
        text-decoration: none;
        color: #fff;
        display: block;
        transition: .3s background-color;
    }

    #gl-menu a:hover {
        background-color: #fff;
        color:black;
    }

    #gl-menu a.active {
        background-color: #005f5f;
        color: white;
        cursor: default;
    }

    @media screen and (min-width: 600px) {
        #gl-menu li {
            width: 120px;
            border-bottom: none;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
        }

        /* Option 1 - Display Inline */
        #gl-menu li {
            display: inline-block;
            margin-right: -4px;
        }

        /* Options 2 - Float
        #gl-menu li {
          float: left;
        }
        #gl-menu ul {
          overflow: auto;
          width: 600px;
          margin: 0 auto;
        }
        #gl-menu {
          background-color: #444;
        }
        */
    }

</style>
<script type="text/javascript">
    function ResizeIframe(Obj) {
        setTimeout(function(){
            Obj.style.height = 0;
            Obj.style.height = Obj.contentWindow.document.body.scrollHeight + 'px';
            console.log(Obj.contentWindow.document.body.scrollHeight + 'px');
        }, 2500);
    }
</script>
