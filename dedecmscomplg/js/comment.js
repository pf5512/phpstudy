//评论图片上传和预览插件
function CommentImage(){}
CommentImage.prototype={
	count_limit:5,
	size_limit:5,
	img_x_offset:10,
	img_y_offset:50,
	img_id:0,
	count:0,
	preview_box:null,
	hidden_box:null,
	control_box:null,
	big_preview:null,
	init:function(container){
		if(container)
		{
			this.hidden_box=document.createElement("div");
			this.hidden_box.className="hidden";
			container.append(this.hidden_box);
			this.preview_box=document.createElement("ul");
			this.preview_box.className="upshareimg";
			container.append(this.preview_box);
			var e=document.createElement("div");
			e.className="upshare";
			container.append(e);
			this.control_box=document.createElement("a");
			this.control_box.setAttribute("href","javascript:void(0)");
			this.control_box.className="btn-add";
			$(e).append(this.control_box);
			var t=document.createElement("span");
			t.className="color1";
			t.innerText="支持批量上传，最多可添加"+thiscount_limit+"张图片，单个文件最大5M";
			$(e).append(t);
			this.newbutton();
		}
		this.big_preview=document.createElement("div");
		this.big_preview.className="upbipreview";
		document.body.appendChild(this.big_preview);
	},

	//添加待上传图片
	addimage:function(e){
		if(this.count>=this.count_limit){
			alert("评论最多只允许添加"+this.count_limit+"张图片");
			return;
		}
		if(this.filesize(e)>(this.size_limit*1024*1024)){
			alert("图片文件大小不能超过"+this.size_limit+"MB");
			return;
		}
		var url=this.geturl(e);
		this.count=this.count+1;
		this.img_id=this.img_id+1;
		e.attr("name","upimg"+this.img_id);
		e.appendTo(this.hidden_box);
		this.newpreview(e,url);
		this.newbutton();
	},
	delimage:function(e,item){
		e.remove();
		$(item).remove();
		this.count=this.count-1;
	},
	reset:function(){
		this.count=0;
		this.hidden_box.innerHTML="";
		this.preview_box.innerHTML="";
	},
	newbutton:function(){
		if(typeof(this.control_box)=="undefined") return;
		var ci=this;
		var e=$(document.createElement("input"));
		e.addClass("fileupload");
		e.attr("type","file");
		e.attr("accept","image/*");
		e.append(this.control_box);
		e.change(function(){
			ci.addimage(e);
		});
	},
	newpreview:function(r,url){
		var ci=this;
		var item=document.createElement("li"); 
		if($browser.msie){
			var div=document.createElement("div");
			div.style.filter="progidDXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale src='"+url+"');";
			div.style.width="60px";
			div.style.height="60px";
			item.appendChild(div);
		}
		else{
			var img=document.createElement("img");
			img.setAttribute("src",url);
			item.appendChild(img);
		}
		var btn=document.createElement("div");
		btn.className="upclosebtn";
		$(btn).click(function(){
			cidelimage(e,img);
		});
		item.appendChild(btn);
		this.preview_box.appendChild(item);
	},
	filesize:function(e){
	},
	geturl:function(e){
		var e=e[0];
		if($.browser.msie)
		{
			try{
				return this.getfileurl(e.files[0]);
			}
			catch(ex){
				var url=null;
				e.select();
				e.blur();
				url=document.selection.createRange().text;
				document.selection.empty();
				return url;
			}
		}
		return this.getfileurl(e.files[0]);
	},
	getfileurl:function(file){
		var url=null;
		if(window.createObjectURL!=undefined){
			url=window.createObjectURL(file);
		}
		else if(window.URL!=undefined){
			url=window.URL.createObjectURL(file);
		}
		else if(window.webkitURL!=undefined){
			url=window.webkitURL.createObjectURL(file)
		}
		return url;
	},
	fillto:function(f){
		if(typeof(f)=="undefined"||typeof(this.hidden_box)=="undefined") return;
		var childs=this.hidden_box.childNodes;
		for(var i=childs.length-1;i>=0;i--){
			f.appendCHild(childs[i]);
		}
	},
	show_preview:function(url,x,y){
		this.big_preview.innerHTML="<img src=\""+url+"\" style=\"max-width:1000px\" />";
		this.big_preview.style.top=(y+this.IMG_Y_OFFSET)+"px";
		this.big_preview.style.left=(x - (this.big_preview.childNodes[0].offsetWidth / 2) + this.IMG_X_OFFSET) + "px";
		this.big_preview.style.display="block";
	},
	hide_preview:function(){
		this.big_preview.style.display="none";
	}
}

var comment_image=new CommentImage();

$(document).ready(function (){
		var $star=$("#star");
		var $li=$star.find("li");
		var $span=$star.find("span");
		var i=iScore=iStar=0;
		
		$li.hover(function()
		{
			var index=$(this).index()+1;
			curPoint(index);
		},
		function()
		{
			curPoint();
		})

		$li.click(function()
		{
			var index=$(this).index()+1;
			var sText=$(this).find("span").text();
			iStar=$(this).index()+1;
		})

		function curPoint(pNum)
		{
			if(pNum){
				iScore=pNum;
			}
			else{
				iScore=iStar;
			}
			for(i=0;i<$li.length;i++)
			{
				if(i<iScore){
					$li.eq(i).addClass("on");
				}
				else{
					$li.eq(i).removeClass("on");
				}
			}
		}
		comment_image.init($('uploadimg'));
	}
)





