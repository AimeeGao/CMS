/**
 * Created by weiyi on 2017/4/24.
 */
function checkForm(){
    // 判断文本框内没有填写数值的情况
    if( document.fdata.num.value == ""
        ||document.fdata.al.value == ""
        ||document.fdata.lan.value == "")
    {
        alert("表单中的每一项都必须填写");
        return false; // 终止表单的提交
    }
    // 判断文本框内有数值的情况
    if(document.fdata.num.value !="")
    {
        var s = document.fdata.num.value;
        if(s.length>9){ // 此处用输入的数值的长度来判断
            alert("第一个文本框字符串长度要小于10！");
            return false;
        }
        for(var loc =0; loc< s.length; loc++){ // i=0; i<(123)=3;i++
            // charAt() 方法可返回指定位置的字符。 charAt(0)返回字符串位置里第一个位置的字符
            if((s.charAt(loc)<'0')|| (s.charAt(loc)>'9')) // 123456789(0) ==1 <"0" 不满足
            {
                alert("第一个文本框内只能输入数字！");
                return false;
            }
        }
    }
    if(document.fdata.al.value != "")
    {
        var t = document.fdata.al.value;
        for(var loc=0; loc< t.length; loc++)
        {
            if(((t.charAt(loc)<'a')||(t.charAt(loc)>'z')) && ((t.charAt(loc)<'A')||(t.charAt(loc)>'Z')))
            {
                alert("第二个文本框只能输入英文字母！");
                return false;
            }
        }
    }
    var v = document.fdata.lan.value;
    var str = "您的填写和选择为：\r\n" + s + "\r\n" + t + "\r\n" +v;
    // \r回到行首 \n换行

    alert(str);
}
