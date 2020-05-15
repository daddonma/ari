
<div class="container">
  <div class="info">
    <h1>Article News Card</h1><span>Made with <i class='fa fa-heart animated infinite pulse'></i> by <a href='http://andy.design'>Andy Tran</a> | Designed by <a href='http://justinkwak.com'>JustinKwak</a></span>
  </div>
  <!-- Normal Demo-->
  <div class="column">
    <div class="demo-title">Normal</div>
    <!-- Post-->
    <div class="post-module">
      <!-- Thumbnail-->
      <div class="thumbnail">
        <div class="date">
          <div class="day">27</div>
          <div class="month">Mar</div>
        </div><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/photo-1429043794791-eb8f26f44081.jpeg"/>
      </div>
      <!-- Post Content-->
      <div class="post-content">
        <div class="category">Photos</div>
        <h1 class="title">City Lights in New York</h1>
        <h2 class="sub_title">The city that never sleeps.</h2>
        <p class="description">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</p>
        <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-">o</i>
            6 mins ago</span><span class="comments"><i class="fa fa-comments"></i><a href="#">39 comments</a></span></div>
      </div>
    </div>
  </div>
  <!-- Hover Demo-->
  <div class="column">
    <div class="demo-title">Demo 2</div>
    <!-- Post-->
    <div class="post-module">
      <!-- Thumbnail-->
      <div class="thumbnail">
        <div class="date">
          <div class="day">27</div>
          <div class="month">Mar</div>
        </div><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/photo-1429043794791-eb8f26f44081.jpeg"/>
      </div>
      <!-- Post Content-->
      <div class="post-content">
        <div class="category">Photos</div>
        <h1 class="title">City Lights in New York</h1>
        <h2 class="sub_title">The city that never sleeps.</h2>
        <p class="description">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</p>
        <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-o"></i>
            6 mins ago</span><span class="comments"><i class="fa fa-comments"></i><a href="#">39 comments</a></span></div>
      </div>
    </div>
  </div>
</div>


<style>
.post-module {
  position: relative;
  z-index: 1;
  display: block;
  min-width: 270px;
  height: 470px;
  box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);

}
.post-module {
  -webkit-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
}
.post-module:hover .thumbnail img{
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  transform: scale(1.1);
  opacity: 0.6;
}

.post-module .thumbnail {
  background: #000000;
  height: 400px;
  overflow: hidden;
}
.post-module .thumbnail .date {
  position: absolute;
  top: 20px;
  right: 20px;
  z-index: 1;
  background: #e74c3c;
  width: 55px;
  height: 55px;
  padding: 12.5px 0;
  -webkit-border-radius: 100%;
  -moz-border-radius: 100%;
  border-radius: 100%;
  color: #FFFFFF;
  font-weight: 700;
  text-align: center;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.post-module .thumbnail img {
  display: block;
  width: 120%;
  -webkit-transition: all 0.3s linear 0s;
  -moz-transition: all 0.3s linear 0s;
  -ms-transition: all 0.3s linear 0s;
  -o-transition: all 0.3s linear 0s;
  transition: all 0.3s linear 0s;
}
.post-module .post-content {
  position: absolute;
  bottom: 0;
  background: #FFFFFF;
  width: 100%;
  padding: 30px;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  -moz-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  -ms-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  -o-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
}
.post-module .post-content .category {
  position: absolute;
  top: -34px;
  left: 0;
  background: #e74c3c;
  padding: 10px 15px;
  color: #FFFFFF;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
}
.post-module .post-content .title {
  margin: 0;
  padding: 0 0 10px;
  color: #333333;
  font-size: 26px;
  font-weight: 700;
}
.post-module .post-content .sub_title {
  margin: 0;
  padding: 0 0 20px;
  color: #e74c3c;
  font-size: 20px;
  font-weight: 400;
}
.post-module .post-content .description {
  display: none;
  color: #666666;
  font-size: 14px;
  line-height: 1.8em;
}
.post-module .post-content .post-meta {
  margin: 30px 0 0;
  color: #999999;
}
.post-module .post-content .post-meta .timestamp {
  margin: 0 16px 0 0;
}
.post-module .post-content .post-meta a {
  color: #999999;
  text-decoration: none;
}
.post-content .description {
  display: block !important;
  height: auto !important;
  opacity: 1 !important;
}
.container {
  max-width: 800px;
  min-width: 640px;
  margin: 0 auto;
}
.container:before,
.container:after {
  content: '';
  display: block;
  clear: both;
}
.container .column {
  width: 50%;
  padding: 0 25px;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  float: left;
}
.container .column .demo-title {
  margin: 0 0 15px;
  color: #666666;
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
}
.container .info {
  width: 300px;
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 24px;
  font-weight: bold;
  color: #333333;
}
.container .info span {
  color: #666666;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #e74c3c;
}

</style>


<script type="text/javascript">
	
</script>