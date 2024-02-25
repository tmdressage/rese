# アプリケーション名
Rese（飲食店予約サービス）

## 作成した目的
上級模擬案件提出用
 
## アプリケーションURL
http://localhost/login<br>  
※本人認証メールとリマインダーはmailhogに送信されます。<br>
http://localhost:8025

## 他のリポジトリ  
無し

## 機能一覧
**基本機能**<br>
・会員登録<br>
・ログイン<br>
・ログアウト<br>
・ユーザー情報取得<br>
・ユーザー飲食店お気に入り一覧取得<br>
・ユーザー飲食店予約情報取得<br>
・飲食店一覧取得<br>
・飲食店詳細取得<br>
・飲食店お気に入り追加<br>
・飲食店お気に入り削除<br>
・飲食店予約情報追加<br>
・飲食店予約情報削除<br>
・エリアで検索する<br>
・ジャンルで検索する<br>
・店名で検索する<br>
<br>
**追加実装機能**<br>
・飲食店予約情報変更<br>
・飲食店評価<br>
・飲食店評価閲覧<br>
・バリデーション(認証／予約)<br>
・店舗代表者作成<br>
・飲食店情報作成<br>
・飲食店情報更新<br>
・飲食店予約情報確認<br>
・飲食店画像のストレージ保存<br>
・メール認証<br>
・予約当日リマインダー送信<br>
  
## 使用技術（実行環境）
OS：Linux（Ubuntu）<br>
環境：Docker Desktop v4.23.0<br>
言語：PHP 7.4.9、JQuery 3.7.1<br>
フレームワーク：Laravel 8<br>
DB：mysql 8.0.26<br>
WEBサーバソフトウェア：nginx 1.21.1<br>
エディタ：VSCode 1.84.0<br>

## テーブル設計
![Screenshot 2024-02-25 162506](https://github.com/tmdressage/rese/assets/144135026/fb94475d-a6c0-4924-be76-750530ec31f8)

## ER図
![Screenshot 2024-02-25 141811](https://github.com/tmdressage/rese/assets/144135026/46ee270d-2ae7-49af-96cd-5f8f414e2b5f)<br>
※中間テーブルの名称につきましては、担当コーチに相談のもと上記の名称で作成しております。

## 環境構築
dockerやlaravelの環境構築方法(セットアップ方法) <br>
<br>
**リポジトリの設定**<br>
※自身でGitHubに開発履歴を残さない場合は、工程１のクローンだけ行います。
<br>
1、開発環境をGitHub からクローンする<br>
※~/coachtechディレクトリ配下のlaravelディレクトリで作業を行う場合を想定して記載します。<br>
<br>
```
$ cd coachtech/laravel
$ git clone git@github.com:tmdressage/rese.git
$ mv rese リポジトリ名
```
<br>
<br>
2、 GitHubでリモートリポジトリをpublicで作成する<br>
※リポジトリ名は前項で作成したリポジトリ名を使用します。<br>
<br>
<br>
3、 リポジトリの紐付け先を変更する<br>
<br>
```
$ cd 1で作成したリポジトリ名
$ git remote set-url origin 2で作成したリモートリポジトリのurl
$ git remote -v　//URLの紐付けが合っているかを確認
```
<br>
<br>
4、 ローカルリポジトリにあるデータを2で作成したリモートリポジトリに反映させる<br>
<br>
```
$ git add .
$ git commit -m "リモートリポジトリの変更"
$ git push origin main
```
<br>
<br>
**Docker の設定**<br>








Docker の設定
Laravel のパッケージのインストール
.env ファイルの作成
view ファイルの作成
css ファイルの作成











## その他
お手数ですがご採点の程よろしくお願い申し上げます。以下補足事項でございます。<br>
<br>
<br>
**全般について**<br>
・ログインをしていない状態では、お気に入り登録・評価閲覧、飲食店予約が<br>
　出来ない仕様にしております(各々クリックするとログイン画面へ飛びます)。<br> 
・認証機能の作成にあたり、参考のためFortifyとLaravel Breezeをインストールしておりますが、<br>
　基本は使用せずに自作いたしました。<br>
・本人確認メールと、予約当日のリマインドメールの送信先は、<br>
　開発用のメールサーバmailhogを使用いたしました。<br>
・シーディングで各テーブル(ユーザ・飲食店情報・お気に入り・予約情報・飲食店評価)に<br>
　データをDBに格納しております。<br>
　便宜上、管理者ユーザ・店舗代表者ユーザ・飲食店情報には固定のデータをDBに格納しておりますので、<br>
　再度シーディングを行う際は、事前にmigrate:freshしていただけますと幸いです。<br>
<br>
<br>
**追加実装機能について**<br>
<br>
**・飲食店予約情報変更**<br>
⇒マイページの予約情報欄の右上に表示される、開いた本のアイコンをクリックいただくと、<br>
　飲食店予約情報変更ページに遷移いたします。<br>
<br>
![Screenshot 2024-02-25 153817](https://github.com/tmdressage/rese/assets/144135026/81b0f23f-d187-412b-9011-3dee73f01a97)<br>
<br>
<br>
<br>
**・飲食店評価**<br>
⇒マイページの予約情報欄(過去日時の予約)の右上に表示される、星のアイコンをクリックいただくと、<br>
　飲食店評価ページに遷移いたします。<br> 
<br>
![Screenshot 2024-02-25 154146](https://github.com/tmdressage/rese/assets/144135026/c82de71b-9fb5-4a90-b1af-719bd6378764)<br>
<br>
<br>
<br>
**・飲食店評価閲覧**<br>
⇒マイページ、または飲食店一覧画面の飲食店カードの右下に表示される、星のアイコンをクリックいただくと、<br>
　飲食店評価閲覧ページに遷移いたします。<br>
<br>
![Screenshot 2024-02-25 154240](https://github.com/tmdressage/rese/assets/144135026/4892b818-fb59-4ff0-8803-6b86f80c5010)<br>
<br>
<br>
<br>
**・バリデーション**<br>
⇒ログイン時・会員登録時・飲食店予約時・飲食店予約変更時、飲食店評価時、店舗代表者作成時、<br>
　飲食店情報作成時において、各々バリデーションを作成いたしました。<br>
<br>
<br>
<br>
**・店舗代表者作成** <br> 
⇒システム管理者ユーザでログインいただくと、店舗代表者作成ページに遷移いたします。<br>
　メールアドレス：admin@example.co.jp<br>
　パスワード：PasswordPassword<br>
<br>
![Screenshot 2024-02-25 155332](https://github.com/tmdressage/rese/assets/144135026/1986e2ef-6975-41cb-85ca-876fa163b4d8)<br> 
<br>
<br>
<br>
**・飲食店情報作成**<br>
⇒作成した店舗代表者ユーザでログインいただくと、飲食店情報作成ページに遷移いたします。<br>
　(初回ログイン時はメール認証から始まります)<br>
<br>
![Screenshot 2024-02-25 155838](https://github.com/tmdressage/rese/assets/144135026/46fc64b0-b4d7-4376-9017-2ff8d7cbb0cf)<br>
<br>
<br>
<br>
**・飲食店情報更新**<br>
⇒新規で店舗情報を登録いただいた後は、同じフォームから上書き更新が出来ます。<br>
<br>
![Screenshot 2024-02-25 160415](https://github.com/tmdressage/rese/assets/144135026/058051d4-4765-4b35-8c87-a7a2d1f252d8)<br>
<br>
<br>
<br>
**・飲食店予約情報確認**<br>
⇒店舗代表者ユーザで、ハンバーガーメニューのReservation Statusをクリックいただくと、<br>
　飲食店予約情報確認ページに遷移いたします。<br>
　まだ飲食店情報を登録していない場合は、飲食店情報登録画面へと飛ぶ仕様です。<br>
<br>
![Screenshot 2024-02-25 160447](https://github.com/tmdressage/rese/assets/144135026/e1e2053d-d2bc-4438-bec0-2b9e7985c750)<br>
<br>
<br>
<br>
**・飲食店画像のストレージ保存**<br>
⇒飲食店情報作成時に、画像をアップロードいただくと、サーバのstorage/app/public/img配下に画像が保存され、<br>
　DBにもパスが格納されます。<br>
　シンボリックリンクにより、出力時はパスを参照して保存した画像が表示されます。<br>
<br>
![Screenshot 2024-02-25 160830](https://github.com/tmdressage/rese/assets/144135026/627ee2b0-f00d-42ca-9119-46fab20a02cc)<br>
<br>
![Screenshot 2024-02-25 161043](https://github.com/tmdressage/rese/assets/144135026/25590e05-c9c7-425d-a671-f415e8f4403e)<br>
<br>
<br>
<br>
**・メール認証**<br>
⇒メールの送信先は、開発用のメールサーバmailhogを使用しております。<br>
　送信ボタンをクリックすると本人確認メールがmailhogに送信されます。<br>
<br>
![Screenshot 2024-02-25 143204](https://github.com/tmdressage/rese/assets/144135026/e37fe2b9-8321-4d51-8920-5172044e6dee)<br>
<br>
![Screenshot 2024-02-25 143344](https://github.com/tmdressage/rese/assets/144135026/c6fd0aa2-fed3-4067-9208-e6fc641e2879)<br>
<br>
<br>
<br>
**・予約当日リマインダー送信**<br>
⇒メールの送信先は、開発用のメールサーバmailhogを使用しております。<br>
　app/Console/Commands/Batch.phpで予約日が当日のレコードを持つユーザ情報を抽出し、<br>
　cronの設定とapp/Console/Kernel.phpで該当ユーザ宛に予約当日の朝8:00にリマインダーが<br>
　送信されるように設定しております。<br>
<br>
![Screenshot 2024-02-25 161546](https://github.com/tmdressage/rese/assets/144135026/c2ffd1f1-ce94-4fbb-9282-9d83c671f02f)<br>
<br>
![Screenshot 2024-02-25 161828](https://github.com/tmdressage/rese/assets/144135026/4c235f75-2145-47f1-9577-b9c6779a6c23)<br>
<br>
<br>
<br>
※その他の追加実装項目（レスポンシブデザイン、お知らせメール送信、QRコード、決済機能、AWS、環境の切り分け）は未実装です。
<br>
<br>
<br>
以上でございます。<br>
拙い点が多々ございますが、ご採点の程よろしくお願い申し上げます。<br>
