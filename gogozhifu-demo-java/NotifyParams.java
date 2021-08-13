/* GOOG支付接入示例代码 - JAVA版本 */
/* 更多信息请前往官网：https://www.gogozhifu.com */

public class NotifyParams {
    private String payId;
    private String param;
    private int type;
    private float price;
    private float reallyPrice;
    private String sign;

    public NotifyParams() {
    }

    public NotifyParams(String payId, String param, int type, float price, float reallyPrice) {
        this.payId = payId;
        this.param = param;
        this.type = type;
        this.price = price;
        this.reallyPrice = reallyPrice;
    }

    public void setPayId(String payId) {
        this.payId = payId;
    }

    public String getPayId() {
        return payId;
    }

    public void setType(int type) {
        this.type = type;
    }

    public int getType() {
        return type;
    }

    public void setParam(String param) {
        this.param = param;
    }

    public String getParam() {
        return param;
    }

    public void setPrice(float price) {
        this.price = price;
    }

    public float getPrice() {
        return price;
    }

    public void setReallyPrice(float reallyPrice) {
        this.reallyPrice = reallyPrice;
    }

    public float getReallyPrice() {
        return reallyPrice;
    }

    public void setSign(String sign) {
        this.sign = sign;
    }

    public String getSign() {
        return sign;
    }
}
