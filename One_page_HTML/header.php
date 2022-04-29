<head>
        <title>SDIM WEB PAGE - Dare to dream!</title>
        <!-- <link rel="stylesheet" href="style.css  "> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=ZCOOL+XiaoWei&display=swap" rel="stylesheet">
        <!-- Use Google font to include characterized font in web-->
        <style type='text/css'>
            nav{
                /* display: flex; Create a flex container and its default value is row  *//* Change*/
                width: 100%;
                padding: 0; /* 第一个值是上边和下边的内边距，第二个值是左边右边的内边距*/
                /* justify-content: space-between; */
                /* align-items: center; */
                text-align: center;
                /* position: relative; */
                z-index: 1;
                        }
            .Page_logo{
                width: 350px;
                margin: 17px 0 30px;
                cursor: pointer;
            }

            nav ul{
                background: #000;
                width: 100%;
                margin-top: 1px;
            }

            nav ul li {
                list-style: none;
                margin: 20px 30px;
                display: inline-block;
                /* padding: 8px 12px; */
                /* position: relative; */
            }
            nav ul li a{
                color: #fff;
                text-decoration: none;
                font-size: 17px;
            }
            nav ul li::after{
                content: ''; /* 一定不要注释这一句，after effect 是仰赖空content来展示效果的*/
                width: 0%;
                height:1px;
                background: #f44336;
                display: block;
                margin: auto;
                transition: 0.5s;
            }
            nav ul li:hover::after{
                width: 100%;
            }

            nav.sticky{
                position: fixed;
                top: 0;
                left: 0;
                padding:0px 8%;
                background: #000;
                display: flex; 
                align-items: center;
                justify-content: space-between;
                transition: padding 1s ;
            }
            nav.sticky ul{
                width: auto;
            }
        </style>
</head>
<body>
        <section class="header">
            <nav id="navbar">  <!--This stands for navigation links -->
                <a href="Page.html"><img src="source/Sustech&SDIM_logo.png" alt="南方科技大学系统设计与智能制造学院" class="Page_logo"></a>
                <!-- <div class="nav-links"> -->
                    <!-- <i class="fa-solid fa-rectangle-xmark"></i> -->
                    <!-- <i class="fa-solid fa-circle-xmark" style="font-size: 10px"></i> -->
                    <!-- <i class="fa fa-times"></i> -->
                    <!-- 不做icons --> 
                    <ul id="menu">
                        <li><a href="">主页</a></li>
                        <li><a href="Sorting_Page.html">分类</a></li>
                        <li><a href="">发布</a></li>
                        <li><a href="">管理</a></li>
                        <li><a href="Contact.html">关于</a></li>
                    </ul>
                 <!-- </div> -->
                <!-- <i class="fa-solid fa-bars" style="font-size: 10px"></i> -->
                <!-- <i class="fa fa-bars" style="font-size: 22px"></i> --> 
            </nav>