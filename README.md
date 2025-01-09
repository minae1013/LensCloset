# LENS CLOSET
## 使用技術一覧
<p style="display: inline">
　<!-- フロントエンドの言語一覧 -->
    <img src="https://img.shields.io/badge/-HTML-99d1ce.svg?logo=&style=for-the-badge">
    <img src="https://img.shields.io/badge/-CSS-1572B6.svg?logo=&style=for-the-badge">
    <img src="https://img.shields.io/badge/-Javascript-fff5a1.svg?logo=javascript&style=for-the-badge">
  <!-- フロントエンドのフレームワーク一覧 -->
<!--   <img src="https://img.shields.io/badge/-Next.js-000000.svg?logo=next.js&style=for-the-badge"> -->
  <!-- バックエンドの言語一覧 -->
  <img src="https://img.shields.io/badge/-Php-cccfff.svg?logo=php&style=for-the-badge">
  <!-- バックエンドのフレームワーク一覧 -->
  <img src="https://img.shields.io/badge/-Laravel-f3a68c.svg?logo=laravel&style=for-the-badge">
  <!-- ミドルウェア一覧 -->
  <img src="https://img.shields.io/badge/-MySQL-4479A1.svg?logo=mysql&style=for-the-badge&logoColor=white">
  <!-- インフラ一覧 -->
  <img src="https://img.shields.io/badge/-Docker-1488C6.svg?logo=docker&style=for-the-badge">
</p>

## 概要
### アプリを作ったきっかけ
プライベートでカラーコンタクトを好んで利用しており、各商品の着用感等は頭の中で記憶して、どのような日にどのコンタクトレンズを着けるか、を選別しています。しかし、カラーコンタクトはパッケージ・デザイン等が全て似通っているため、利用したことがあるコンタクトレンズの種類が増えてくるとどのような着け心地であったかを思い出すことが難しい場面が多々あります。そこで、利用履歴のあるコンタクトレンズの着用感を価格や使用期間と併せて登録しておけるメモ帳アプリがあれば便利だと考え、本アプリの開発に至りました。

### アプリ機能説明
・ブランド名/パッケージ画像/使用期間/価格/着用感などを登録でき、利用履歴のあるコンタクトレンズ情報を一元管理します。

・お気に入りのコンタクトレンズを別ページで確認することができます。「リピート：あり」と登録したコンタクトレンズは自動的に抽出され、お気に入り一覧画面に表示されます。

・検索機能でブランド名/色/コメント内容のいずれかで検索をかけることができます。

### 今後の実装予定
・画像を複数件登録できるように調整（着用写真を載せる用）

・気になるリストの実装

### アプリ表示側イメージ
![スクリーンショット 2025-01-08 1 48 23](https://github.com/user-attachments/assets/bc573d2d-c43d-4725-bf87-41a89b6a81f5)

一覧画面
![スクリーンショット 2025-01-10 1 53 01](https://github.com/user-attachments/assets/0ad1bd41-a23a-4330-b55f-9da87fc625eb)

詳細画面
![スクリーンショット 2025-01-10 1 54 02](https://github.com/user-attachments/assets/4c2beb6a-9fc5-4eb9-9647-94dbc8896b7d)

登録画面
![スクリーンショット 2025-01-10 1 54 46](https://github.com/user-attachments/assets/c092665f-e8a3-4c3c-9683-496b0a04db4d)


### アプリURL
https://lens-closet-2ea748a21338.herokuapp.com/
#### テストアカウント
~~~
    ID:testuser@example.com
    PASS:password
~~~

## 開発環境の構築方法

### 構築環境

docker
laravel 11（sail利用）

1. git clone
~~~
git clone ~~~
~~~
2. 環境変数ファイルの作成

clone したディレクトリへ移動
~~~
cd ~~~
cp .env.example .env
~~~
3. パッケージインストール
~~~
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
~~~
4. Dockerコンテナ起動
~~~
./vendor/bin/sail up -d
~~~
5. APP_KEYの生成
~~~
./vendor/bin/sail artisan key:generate
~~~

6. フロントパッケージインストール
~~~
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
~~~

7. マイグレーション
~~~
./vendor/bin/sail artisan migrate
~~~

8.シーダー実行
~~~
./vendor/bin/sail　artisan db:seed
~~~

※エイリアスを変更
sailコマンドがsail~で実行できるようになる 例：sail artisan migrate
~~~
alias sail="vendor/bin/sail"
~~~
