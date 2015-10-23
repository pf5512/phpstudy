var testMenu=[
    {
        "name": "新闻资讯",
        "submenu": [
		    {
                "name": "<div style='margin-left:30px;'><img src='/templets/puertea/images/tri.png'></div>",
                "url": ""
            },
            {
                "name": "<a href='/news/qiyexinwen/'>企业新闻</a>",
                "url": ""
            },
            {
                "name": "<a href='/news/xingyexinwen/'>行业新闻</a>",
                "url": ""
            }
        ]
    },
    {
        "name": "<a href='/introduct.html'>品牌介绍</a>",
    },
    {
        "name": "<a href='/product/'>产品介绍</a>",
    },
    {
        "name": "<a href='/contact.html'>联系我们</a>",
        "url": ""
    }
];
	$(function(){
		new AccordionMenu({menuArrs:testMenu});
	});
