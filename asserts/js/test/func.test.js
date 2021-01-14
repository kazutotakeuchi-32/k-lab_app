const func = require('./func')
const buildhtml  = func.buildhtml
const buildhtml2 = func.buildhtml2
const escapeHTML = func.escapeHTML
const validation = func.validation
const user       = func.user
const apps = func.apps
const $ = require('jquery');
const {test, expect } = require('@jest/globals');


// escapeHTML
describe('function escapeHTML test', () => {
  test("test is escaped to test ",()=>{
    expect(escapeHTML('test')).toEqual('test');
  })
  test("'<script>alert('test')</script>' is escaped to '&lt;script&gt;alert(&quot;test&quot;)&lt;/script&gt;'",()=>{
    expect(escapeHTML('<script>alert("test")</script>')).toEqual('&lt;script&gt;alert(&quot;test&quot;)&lt;/script&gt;');
  })
})
// buildhtml
describe('function buildhtml test', () => {
  test("All links exist",()=>{
    const html = buildhtml(apps[1])
    document.body.innerHTML = html;
    expect($("a").length).toEqual(4)
  })
  test("demo link exists",()=>{
    const html = buildhtml(apps[0])
    document.body.innerHTML = html;
    expect($("a").length).toEqual(2)
    expect([].some.call($("a"),a=>a.textContent=="Demo")).toBe(true)
  })
  test("There is a link other than blog",()=>{
    const html = buildhtml(apps[3])
    document.body.innerHTML = html;
    expect($("a").length).toBe(3)
    expect([].some.call($("a"),a=>a.textContent=="blog")).toBe(false)
  })
  test("Style is not applied if the number of characters is 13 or less",()=>{
    const html = buildhtml(apps[1])
    document.body.innerHTML = html;
    expect($("h4 span")[0].style['_values']).toEqual({})
  })
  test("If it is larger than 13 characters, reduce the font size",()=>{
    const html = buildhtml(apps[2])
    document.body.innerHTML = html;
    expect($("h4 span")[0].style['_values']).toEqual({ 'font-size': '15px' })
  })
})
describe('function buildhtml2 test', () => {
  test("HTML element is return",()=>{
    const html = buildhtml2({name:"name",value:"kazu"},{name:"email",value:"rails@gmail.com"},{name:"message",value:"初めましてこんにちわ"},{name:"csrf_token",value:"sgogkkwkgkp@kecaefbmomoepwd"})
    document.body.innerHTML = html;
    expect($("td")[0].textContent).toEqual("name")
    expect($("td")[1].textContent).toEqual("kazu")
    expect($("td")[2].textContent).toEqual("email")
    expect($("td")[3].textContent).toEqual("rails@gmail.com")
    expect($("td")[4].textContent).toEqual("message")
    expect($("td")[5].textContent).toEqual("初めましてこんにちわ")
    expect($("input")[0].name).toEqual("name")
    expect($("input")[0].value).toEqual("kazu")
    expect($("input")[1].name).toEqual("csrf_token")
    expect($("input")[1].value).toEqual("sgogkkwkgkp@kecaefbmomoepwd")
    expect($("input")[2].name).toEqual("email")
    expect($("input")[2].value).toEqual("rails@gmail.com")
    expect($("input")[3].name).toEqual("message")
    expect($("input")[3].value).toEqual("初めましてこんにちわ")
  })
})

// validation
describe('function buildhtml2 test', () => {
  test("Value is valid",()=>{
    testUser = {...user}
    expect(validation(testUser.name,testUser.email,testUser.message)).toEqual([])
  })
  test("The name is blank",()=>{
    testUser = {...user,name:{...user.name,value:""}}
    console.log(testUser);
    expect(validation(testUser.name,testUser.email,testUser.message)[0]).toEqual("名前を入力をしてください。")
  })
  test("The email is blank",()=>{
    testUser =  {...user,email:{...user.email,value:""}}
    expect(validation(testUser.name,testUser.email,testUser.message)[0]).toEqual("メールアドレスを入力をしてください。")
  })
  test("The message is blank",()=>{
    testUser =  {...user,message:{...user.message,value:""}}
    expect(validation(testUser.name,testUser.email,testUser.message)[0]).toEqual("お問い合わせ内容を入力をしてください。")
  })
  test("The name within 30 characters",()=>{
    testUser =  {...user,name:{...user.name,value:"a".repeat(31)}}
    expect(validation(testUser.name,testUser.email,testUser.message)[0]).toEqual("名前は30文字以内で入力をしてください。")
  })
  test("Invalid email address format",()=>{
    const InvalidEmailFormats=["user","user@","lab.com","lab@@.com","user@..com"]
    for (let i = 0; i <InvalidEmailFormats.length; i++) {
       testUser =  {...user,email:{...user.email,value:InvalidEmailFormats[i]}}
       expect(validation(testUser.name,testUser.email,testUser.message)[0]).toEqual("メールアドレスの形式に誤りがあります。")
    }
  })
})
