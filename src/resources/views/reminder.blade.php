<p>{{$reservation->name}}様</p>

<p>いつもReseをご利用いただきありがとうございます。<br>
    下記予約の当日になりましたので、リマインドメールをお送りいたします。</p>
<p>********************************************************************<br>
    予約日：{{ substr($reservation->reserve_datetime, 0, 10) }}<br>
    予約時間：{{ substr($reservation->reserve_datetime, 11, 5) }}<br>
    飲食店名：{{$reservation->shop_name}}<br>
    予約人数：{{$reservation->reserve_number}}名様<br>
    ********************************************************************<br>
    ご来店のほどよろしくお願いいたします。</p>

<p>※万一、予約の変更やキャンセルをする場合はReseにログインして操作してください。</p>
<p>http://localhost/login</p>