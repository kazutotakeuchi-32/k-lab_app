exports.buildhtml = function buildHtml({app:{name,description,technologyUsed,url,images,git,blog}}){
  return `
    <div class="description__box">
        <h4 class="center-align">
          <span style="${name.length >=13 ? "font-size: 15px;":""}">${name}</span>
        </h4>
        ${description}
        <a href="${url}"><i class="fas fa-video" ></i>Demo</a>
        ${git ? `<a href="${git}"><i class="fab fa-github"></i>GitHub</a>`:""}
        ${blog ? `<a href="${blog}"><i class="fab fa-wordpress"></i>ブログ</a>`:""}
        <h5 class="center-align">
          <span class="dd">使用技術</span>
        </h5>
        ${technologyUsed}
      </div>
      <div class="app_image__box">
        <div class="thumbnails">
          ${
            images.map(image => {
              return `<img class="${image.class}" src="stylesheets/images/${image.src}" alt="" >`
            }).join("")
          }
        </div>
        <div class="main_image">
          <a href="${url}"><img class="" src="stylesheets/images/${images[0].src}" alt="" width="100px" height="100px"></a>
        </div>
      </div>
    </div>
  `
}

exports.buildhtml2 = function buildHtml2(name,email,message,csrfToken) {
  return `
   <div class = "confirmation">
    <h2><i class="fas fa-check-square"></i>Confirmation</h2>
    <p>こちらの内容でよろしいですか?</p>
    <div class="confirmation__content">
      <table>
        <tbody>
          <tr>
            <td>${name.name}</td>
            <td>${name.value}</td>
          </tr>
          <tr>
            <td>${email.name}</td>
            <td>${email.value}</td>
          </tr>
          <tr>
            <td>${message.name}</td>
            <td>${message.value}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <form action="send.php"  method="POST">
      <input type="hidden" name=${name.name} value=${name.value}>
      <input type="hidden" name=${csrfToken.name} value=${csrfToken.value}>
      <input type="hidden" name=${email.name} value=${email.value}>
      <input type="hidden" name=${message.name} value=${message.value}>
      <div class="form-field col x-100 align-center">
        <input class="submit-btn" type="submit" value="Submit">
      </div>
    </form>
   </div>
  `
}

exports.escapeHTML = function escapeHTML(string){
return string.replace(/\&/g, '&amp;')
  .replace(/\</g, '&lt;')
  .replace(/\>/g, '&gt;')
  .replace(/\"/g, '&quot;')
  .replace(/\'/g, '&#x27');
}

exports.validation=function validation(name,email,message){

  const errs = []
  if (name.value.length==[]) {
    errs.push("名前を入力をしてください。")
  }else if (name.value.length > 30) {
    errs.push("名前は30文字以内で入力をしてください。")
  }
  if (email.value.length==[]) {
    errs.push("メールアドレスを入力をしてください。")
  }else if (!email.value.match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_-]{1,}\.[A-Za-z0-9]{1,}$/) ) {
    errs.push("メールアドレスの形式に誤りがあります。")
  }
  if (message.value.length==[]) {
    errs.push("お問い合わせ内容を入力をしてください。")
  }
  return errs
}

exports.apps= [
  {
     app:{
       name:"kazugramming",
       description:'<p>僕が運営をしているプログラミング特化サイトです。主に</p><p>興味がある方はこちらから</p>',
       technologyUsed:'<p>HTML CSS jQurey PHP XSERVER',
       url:"https://taketon-blog.com/kazugramming/",
       git:false,
       blog:false,
       images:[
         {class:"kazugramming",src:`kazugramming1.png`},
         {class:"kazugramming",src:`kazugramming2.png`},
         {class:"kazugramming",src:`kazugramming3.jpeg`},
         {class:"kazugramming",src:`kazugramming4.jpeg`},
         {class:"kazugramming",src:`kazugramming5.jpeg`},
         {class:"kazugramming",src:`kazugramming6.jpeg`}
       ]
     }
   },
 {
   app:{
     name:"Typing Game",
     description:'<p>Reactを学習をして１週間で作成したアプリです。</p><p>興味がある方はこちらから</p>',
     technologyUsed:'<p>HTML CSS React</p>',
     url:"https://kazutotakeuchi-32.github.io/typing/",
     git:"https://github.com/kazutotakeuchi-32/typing",
     blog:"https://taketon-blog.com/kazugramming/%e3%82%bf%e3%82%a4%e3%83%94%e3%83%b3%e3%82%b0%e3%82%b2%e3%83%bc%e3%83%a0%e3%82%92%e4%bd%9c%e3%82%8d%e3%81%86/",
     images:[
       {class:"typing_games",src:`typing_games1.png`},
       {class:"typing_games",src:`typing_games2.jpeg`},
       {class:"typing_games",src:`typing_games3.jpeg`},
     ]
   }
 },
 {
   app:{
     name:"エクスプレッシブタイピング",
     description:'<p>プログラミング初めて3ヶ月で作成したアプリになります。エクスプレシッブライティングという鬱病の治療に用いれられるテクニックをPCに転用しました。</p><p>「ひたすらにタイピングをする」という動作を取ることでストレス解消の効果が期待され、更にワーキングメモリ力も上がります。  </p>',
     technologyUsed:'<p>HTML CSS JavaScrpt Ruby on Rails mysql(開発) postSql(本番) Heroku</p>',
     url:"https://calm-peak-17615.herokuapp.com/",
     git:"https://github.com/kazutotakeuchi-32/clean_typing_app",
     blog:"https://taketon-blog.com/kazugramming/%e3%82%a8%e3%82%af%e3%82%b9%e3%83%97%e3%83%ac%e3%83%83%e3%82%b7%e3%83%96%e3%82%bf%e3%82%a4%e3%83%94%e3%83%b3%e3%82%b0%e6%a6%82%e8%a6%81/",
     images:[
       {class:"excipressive",src:`excipressive1.jpeg`},
       {class:"excipressive",src:`excipressive2.png`},
       {class:"excipressive",src:`excipressive3.png`},
       {class:"excipressive",src:`excipressive4.gif`},
       {class:"excipressive",src:`excipressive5.gif`},
       {class:"excipressive",src:`excipressive6.png`},
       {class:"excipressive",src:`excipressive7.png`}
     ]
   }
 },
 {
   app:{
     name:"Kazugramming bot LINE",
     description:'<p>「kazugramming」のLINE botです。よく読まれる記事や、最新記事に素早くアクセスができます。リッチメニューがあるのでとても良い使用感になっております。</p><p>ぜひ使ってみてください。</p>',
     technologyUsed:'<p> Ruby on Rails PHP WorrdPress LINE MESSAGE API WP API  Heroku</p>',
     url:"https://line.me/R/ti/p/%40378klewh",
     git:"https://github.com/kazutotakeuchi-32/kazugramming_app",
     blog:false,
     images:[
       {class:"kazugramming_bot",src:`kazugramming_bot1.png`},
       {class:"kazugramming_bot",src:`kazugramming_bot2.png`},
     ]
   }
}]

exports.user = {
  name:{name:"name",value:"jun"},
  email:{name:"email",value:"jun@gmail.com"},
  message:{name:"message",value:"初めまして"}
}
