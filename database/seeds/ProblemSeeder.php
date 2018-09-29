<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `problems`(`id`,`title`,`category`,`statement`,`point`,`hint`,`author_id`,`link`,`created_at`,`updated_at`,`reserved_at`,`hint_open_at`) VALUES
            (1,'Opening',1,'<p>CTFは問題からflagの文字列を探し出し、flagをsubmitすれば得点が入ります。<br>\nwelcomeCTFのflag形式はwelcomeCTF{}です。<br>\nこの問題は練習問題です。<br>\n下の入力欄にflagを入力してSubmitボタンを押して、答えを送信しましょう！</p>\n<div id=code-zone><div>welcomeCTF{Let\'s_enjoy_CTF}</div></div>',50,'flagをコピー&ペーストすると打ち間違いがなくなります。',1,'https://qiita.com/smicle/private/d60012341e806d9916ff','2018-07-15 17:30:17',NULL,NULL,NULL),
            (2,'Strings_Message ',2,'<p>この写真の中にflagを残しておいたよ！</p>',50,'バイナリ！',4,'https://qiita.com/iria_piyo/private/3a1c7c0b970bf9d5979b','2018-07-15 17:30:17',NULL,NULL,NULL),
            (3,'Let\'s_decode',1,'<p>何と書かれているのでしょうか?</p><div id=code-zone><div>d2VsY29tZUNURntFZmluaV9SWC03fQ==</div></div>',50,'',6,'https://qiita.com/cha1aza/private/08470a9dcb2a87c93393','2018-07-15 17:30:17',NULL,NULL,NULL),
            (4,'Who is this?',1,'<p>こいつの名前を答えよ。<br>flagの形式: welcomeCTF{XXX(全部大文字)}</p>',50,'',5,'https://qiita.com/8ayac/private/7dbd7d4c112a64d893cc','2018-07-15 17:30:17',NULL,NULL,NULL),
            (5,'Find!Find!Find!!!!! ',1,'<p>次のテキストからFlagを探せ!!!<br><br>\n約500万文字のテキスト中にFlagが隠されている</p>',50,'',7,'','2018-07-15 17:30:17',NULL,NULL,NULL),
            (6,'rfc7519',1,'<p><div id=code-zone><div>eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.\neyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6Ik5vTmFtZSIsImlhdCI6MTUxNjIzOTAyMiwiRmxhZyI6IndlbGNvbWVDVEZ7RVpfSjUwTl9XMzZfVDBLM059In0.\nCDdP-sKmOeidcEpQTlYZI0rM36qjZ1MZgmM9zdYuFGPbJTta6uNYJuWJT9x9O580noty1mJ_0Gw2GEJIzzc5XQ</div></div></p>',50,'',8,'','2018-07-15 17:30:17',NULL,NULL,NULL),
            (7,'Easy_Cipher',3,'<p>暗号文を解読して下さい。flagは全て大文字です。<br>暗号文:21421515143432</p>\n<p>Flag形式:welcomeCTF{~~~}</p>',100,'暗号文には規則性があります。',1,'https://qiita.com/smicle/private/484462397d97e5c87c18','2018-07-15 17:30:17',NULL,NULL,NULL),
            (8,'F*ck!',1,'<p>this file flag.</p>',100,'これはプログラミング言語です。',2,'https://qiita.com/somebody_gp/private/9d1fba7d202311ead515','2018-07-15 17:30:17',NULL,NULL,NULL),
            (9,'very_easy_forensics',4,'<p>このファイルは壊れていて見ることができない。この中にflagが入っているはずなんだけど...</p>',100,'docxファイルのマジックナンバーを調べてみよう！<br>同じマジックナンバーを持つファイル形式があるらしい...',4,'https://qiita.com/iria_piyo/private/e3112faff3a871d3ea15','2018-07-15 17:30:17',NULL,NULL,NULL),
            (10,'Information',4,'<p>このJPEG形式の画像の中に残された情報からflagを見つけてください。</p>',100,'',4,'https://qiita.com/iria_piyo/private/ebb5071901715f4b10e2','2018-07-15 17:30:17',NULL,NULL,NULL),
            (11,'To be developer',5,'<p>自明</p>',100,'',5,'https://qiita.com/8ayac/private/4415aadedef8a46b082b','2018-07-15 17:30:17',NULL,NULL,NULL),
            (12,'Use_your_eyes!',1,'<p>この2枚の画像にどんな秘密が隠れているのでしょう？</p>',100,'',6,'https://qiita.com/cha1aza/private/4b3564511376737c70e2','2018-07-15 17:30:17',NULL,NULL,NULL),
            (13,'Emoticon',3,'<div id=code-zone><div>:(:):):):(:):):):(:):):(:(:):(:):(:):):(:):):(:(:(:):):(:(:(:):):(:):):(:):):):):(:):):(:):):(:):(:):):(:(:):(:):(:):(:(:(:(:):):(:):(:):(:):(:(:(:):(:(:(:):):(:(:):):):):(:):):(:):(:(:(:(:):(:(:):(:(:(:(:(:):(:):(:(:(:(:):(:(:):(:):):(:(:):(:):(:):):):):):(:):(:):(:(:):):(:):(:(:):(:(:):(:):(:(:):):(:):(:):(:):(:(:(:(:(:):(:(:):):(:(:(:):(:(:(:):(:):(:):(:):):):):):(:):(:(:(:(:):(:(:):(:(:):(:(:):(:):(:(:):):):(:(:):(:(:(:(:(:):(:):(:):(:(:):(:(:):(:):):(:(:):(:):):):):):(:)</div></div>',100,'',5,'https://qiita.com/8ayac/private/f2ae0db30d1fa23c7fc3','2018-07-15 17:30:17',NULL,NULL,NULL),
            (14,'Image_file',1,'<p>zipファイルの中に問題があります、Flagが見えないように隠されているので頑張って見てね。</p>',100,'Photoshopを使わなくてもいけます。',1,'https://qiita.com/smicle/private/d73662608e0b64ba8dfc','2018-07-15 17:30:17',NULL,NULL,NULL),
            (15,'Extraction',4,'<p>この画像の中にflagの画像を隠したよ！見つけてね！</p>',100,'',4,'https://qiita.com/iria_piyo/private/8e96fc2a179b8148fcdd','2018-07-15 17:30:17',NULL,NULL,NULL),
            (16,'Difficult_Code_To_Read ',6,'<p>読みにくいコードですね。</p>\n<div id=code-zone><div>
            console.log(`welcomeCTF\{\$\{(\!\!\[\]+\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\])\[+\!+\[\]+\[+\[\]\]\]+(+(+\!+\[\]+\[+\!+\[\]\]))\[(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\])\[+\!+\[\]+\[+\[\]\]\]+(+\!\[\]+(\[\]+\[\])\[(\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\])\[+\!+\[\]+\[+\[\]\]\]+(\[\]\[\[\]\]+\[\])\[+\!+\[\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]+(\[\]\[\[\]\]+\[\])\[+\[\]\]+(\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\[\]\[\[\]\]+\[\])\[+\!+\[\]\]+(+\!\[\]+\[\!\[\]\]+(\[\]+\[\])\[(\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\])\[+\!+\[\]+\[+\[\]\]\]+(\[\]\[\[\]\]+\[\])\[+\!+\[\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]+(\[\]\[\[\]\]+\[\])\[+\[\]\]+(\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\])\[\!+\[\]+\!+\[\]+\[+\[\]\]\]\](\!+\[\]+\!+\[\]+\[+\[\]\])+(\!\[\]+\[\])\[+\[\]\]+(\[\]\[\[\]\]+\[\])\[+\[\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\[\]+\[\])\[+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\!\[\]+\[\]\[(\!\[\]+\[\])\[+\[\]\]+(\[\!\[\]\]+\[\]\[\[\]\])\[+\!+\[\]+\[+\[\]\]\]+(\!\[\]+\[\])\[\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\[\]\]+(\!\!\[\]+\[\])\[\!+\[\]+\!+\[\]+\!+\[\]\]+(\!\!\[\]+\[\])\[+\!+\[\]\]\])\[+\!+\[\]+\[+\[\]\]\]+(\[\]\[\[\]\]+\[\])\[+\!+\[\]\]\}\}`);
            </div></div>',150,'沢山の記号に惑わされないで！読める文字がちゃんとあります。',1,'https://qiita.com/smicle/private/e0f04c65585fcd64d8f5','2018-07-15 17:30:17',NULL,NULL,NULL),
            (17,'Final_Task',5,'<p>次のWebサイトからflagを探し出して下さい。<br>\nflagは画面に見えない所にあります。<br>\nhttp:// ~~~</p>',150,'ソースコードはhtmlだけではありません。',1,'https://qiita.com/smicle/private/313708be9e237eb71208','2018-07-15 17:30:17',NULL,NULL,NULL),
            (18,'File_Recovery ',4,'<p>pngファイルが壊れて画像を見ることができないので修正してflagを見つけて下さい。\n</p>',150,'ファイルを識別する数字',4,'https://qiita.com/iria_piyo/private/effed373046973a2f23c','2018-07-15 17:30:17',NULL,NULL,NULL),
            (19,'Reading packets ',7,'<p>USBの通信を見てflagを取得してください。</p>',150,'pcapファイルを開くツールの一つにWiresharkというものがあります。',2,'https://qiita.com/somebody_gp/private/0bf770935e49d71396a2','2018-07-15 17:30:17',NULL,NULL,NULL),
            (20,'hide_and_seek',8,'',150,'',3,'https://qiita.com/miyagaw61/private/252885c2802c5eb3246d','2018-07-15 17:30:17',NULL,NULL,NULL),
            (21,'Baby golf',6,'<p>このJavaScriptのコードを出来るだけ短くしましょう。\n<br>\n<div id=code-zone><div>console.log(true,10000,2097152)</div></div>\n最少コードがflagの中身です。\n</p>',150,':2097152は2の20乗です。',1,'https://qiita.com/smicle/private/ef38d2170c9e3befa02b','2018-07-15 17:30:17',NULL,NULL,NULL),
            (22,'Vigenere_cipher ',3,'<p>とある童話がヴィジュネル暗号で暗号化されています。\nflagはwelcomeCTF{この童話の原題}です。\n単語間のスペースは_(半角下線符号)に変換し、全て半角大文字で解答して下さい。</p>\n<div id=code-zone><div>TIGNPTTIYIOFAOFTIGSVPHBFARWASTEMCBPWTXJIDJOGVHFOWBUTIGSUTOOIESYHJNEUJEZYESGDJUPVVIOIWJVHNWCIJEBVAOFBMWSUGRBVRBXEMGRQCSTGDBNOOITIGRPCDXTAQREEKNBELPCKMGTVUAHTEFUAJFTIGSVPTICTIGITVHFUTSQNHGRXJODCNTVRJRTICTUTAWGLFTOGJITELPCKWGRZYEMNGSQWMGDUJEOQRUJWJPDBPDBVOOEETGNUCCPNDIQWMKNHDLBUTBIAJPSUVHFVRBXEMGRXKTIVHFHISUTHWSUQFXKNEVHFGNEUOGVHFELPCKXJIQREECBPWTUJEUTAWGLFTSCQDZDUUJEJOMFFIBVEMAWSCPQGDJVCMQSFNYBTOVPDIKMBPDUJEICREGRUJEXKNEDLFYTIGTJIHUGRIGHFNDJVTPJINVHFPOSVHXKNEVOSGAOIRJNYBVTIGCMQALDUUCLMJITGFGQRUUWFTEJPVBKNUJEOVHFUUODEHCNUQSIKNFCTGKRTVHJUBFCMTYESGGFPTMGAOFIOVHFRLFCSBPTXCRNVHBHTFTTIGBJVTFTCPNDPHTIGNPTTIYIOFTIGTSCVFNESWNGCSUGNFFHJUCMQALCNENEUKTICNHNOPUEMAFSQMIKSTJOVNDFTSUJETWNTTAZUGSGWXCRNGRBPDXCRNGRUJENCNUQOLQFGJITEAQCNEOOQREEJITDRPYAUNATVHFDEDCMFUOIGAUGDUJAUJEQWLMGDPHFIKSDNOBMAOFTPGSDCPFVHFDLBBIOISVPSIKNFVHSGWIKMTGLGFOXPIOVHFYEMEONGSICDFQFBVRFGBZVHFTOBFSJFEHGNUNEOGSTCNEMIOFPFTSVCSJQNXKNXJESGFPTCFCNEDLVUTFTFBKL</div></div>',200,'<p>この暗号は単純な頻度解析では解読できません。<br>\nまずは鍵の長さを求めてみましょう。<br>\n繰り返し出現する文字列とその間隔に着目してみると...?</p>',6,'https://qiita.com/cha1aza/private/35f05791a1d3dc0abc6f','2018-07-15 17:30:17',NULL,NULL,NULL),
            (23,'obfuscation Linux command ',3,'<p>この問題は難読化シェル芸なのでLinuxコマンドです。<br>\nwelcomeCTF{***}の***が隠されていて、形式はflag:***の***です。<br>\nターミナル上に貼り付けてEnterを押すと動きます。</p>\n<div id=code-zone><div>OiBkdW1teQ== | $\'u0062x61163u0065x3664\' -`echo $\'x64\'` | `echo $\'x67x72x65x70\'` -$(printf \"%b\" $(printf \'%s%x\' \'x\' $((0x80 ^ 0xf1)))) `echo \\x$(printf \"%d\n\" $(expr $(echo \"白鳥\"|base64|tr -d Oomg=DC9Qb5l) / $(echo \"武藤\"|base64|tr -d =gD5JkeqQm6oC)))$(echo \"ずっとも\"|base64|tr -d o4gKCjG=)`&&echo $(echo \"たらこ　IPhone　綾鷹\"|base64|tr -d AGKJTC=4VBob25S76e+)$\'x3a\'$(echo \"maimai\"|base64|tr -d bWFCg=|awk \'{print substr($0,(length($0)+1)-1,2)}\')$(uname|md5sum|cut -c7)$\'163\'$(ls --help|grep ^G|cut -c6)p$(uname|awk \'{print substr($0,index($0,\"i\"),
            1)}\')||`base64 --v|sed -n 1p|cut -b 1-4``uname --version|sed -n 1p|cut -b 2-5` \"$(echo RmluZCB0aGUgZmxhZyBieSBkZWNpcGhlcmluZw==|$\'u0062x61163u0065x3664\' -`echo $\'x64\'`)\"</div></div>',200,'難読化シェル芸はあるコマンドにとても弱いです。',1,'https://qiita.com/smicle/private/75476e3b14cb6bc811ca','2018-07-15 17:30:17',NULL,NULL,NULL),
            (24,'First_Pwn',8,'<p>問題のバイナリをダウンロードしてflagを探して下さい！<br>\nこの問題は難しいので無理せず解ける問題を解いて下さい。</p>',300,'64bit用のLinuxで32bitファイルが実行出来ない場合はsudo apt install -y lib32z1を実行すると、ファイルが実行出来るようになります。',1,'https://qiita.com/smicle/private/b00208884014b42763be','2018-07-15 17:30:17',NULL,NULL,NULL);
        ");
    }
}
