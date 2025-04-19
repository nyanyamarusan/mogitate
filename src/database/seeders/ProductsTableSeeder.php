<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => 'キウイ',
            'description' => <<<TEXT
            キウイは甘みと酸味のバランスが絶妙なフルーツです。
            ビタミンCなどの栄養素も豊富のため、美肌効果や疲労回復効果も期待できます。
            もぎたてフルーツのスムージーをお召し上がりください！
            TEXT,
            'price' => 800,
            'image' => 'kiwi.png',
        ];
        $productId = DB::table('products')->insertGetId($param);
        $autumn = Season::where('name', '秋')->first();
        $winter = Season::where('name', '冬')->first();
        DB::table('product_season')->insert([
            ['product_id' => $productId, 'season_id' => $autumn->id],
            ['product_id' => $productId, 'season_id' => $winter->id],
        ]);

        $param = [
            'name' => 'ストロベリー',
            'description' => <<<TEXT
            大人から子供まで大人気のストロベリー。
            当店では鮮度抜群の完熟いちごを使用しています。
            ビタミンCはもちろん食物繊維も豊富なため、腸内環境の改善も期待できます。
            もぎたてフルーツのスムージーをお召し上がりください！
            TEXT,
            'price' => 1200,
            'image' => 'strawberry.png',
        ];
        $productId = DB::table('products')->insertGetId($param);
        $spring = Season::where('name', '春')->first();
        DB::table('product_season')->insert([
            ['product_id' => $productId, 'season_id' => $spring->id],
        ]);

        $param = [
            'name' => 'オレンジ',
            'description' => <<<TEXT
            当店では酸味と甘みのバランスが抜群のネーブルオレンジを使用しています。
            酸味は控えめで、甘さと濃厚な果汁が魅力の商品です。
            もぎたてフルーツのスムージをお召し上がりください！
            TEXT,
            'price' => 850,
            'image' => 'orange.png',
        ];
        $productId = DB::table('products')->insertGetId($param);
        $winter = Season::where('name', '冬')->first();
        DB::table('product_season')->insert([
            ['product_id' => $productId, 'season_id' => $winter->id],
        ]);

        $param = [
            'name' => 'スイカ',
            'description' => <<<TEXT
            甘くてシャリシャリ食感が魅力のスイカ。
            全体の90％が水分のため、暑い日の水分補給や熱中症予防、カロリーが気になる方にもおすすめの商品です。
            もぎたてフルーツのスムージーをお召し上がりください！
            TEXT,
            'price' => 700,
            'image' => 'watermelon.png',
        ];
        $productId = DB::table('products')->insertGetId($param);
        $summer = Season::where('name', '夏')->first();
        DB::table('product_season')->insert([
            ['product_id' => $productId, 'season_id' => $summer->id],
        ]);

        $param = [
            'name' => 'ピーチ',
            'description' => <<<TEXT
            豊潤な香りととろけるような甘さが魅力のピーチ。
            美味しさはもちろん見た目の可愛さも抜群の商品です。
            ビタミンEが豊富なため、生活習慣病の予防にもおすすめです。
            もぎたてフルーツのスムージーをお召し上がりください！
            TEXT,
            'price' => 1000,
            'image' => 'peach.png',
        ];
        $productId = DB::table('products')->insertGetId($param);
        $summer = Season::where('name', '夏')->first();
        DB::table('product_season')->insert([
            ['product_id' => $productId, 'season_id' => $summer->id],
        ]);

        $param = [
            'name' => 'シャインマスカット',
            'description' => <<<TEXT
            爽やかな香りと上品な甘みが特長的なシャインマスカットは大人から子どもまで大人気のフルーツです。
            疲れた脳や体のエネルギー補給にも最適の商品です。
            もぎたてフルーツのスムージーをお召し上がりください！
            TEXT,
            'price' => 1400,
            'image' => 'muscat.png',
        ];
        $productId = DB::table('products')->insertGetId($param);
        $summer = Season::where('name', '夏')->first();
        $autumn = Season::where('name', '秋')->first();
        DB::table('product_season')->insert([
            ['product_id' => $productId, 'season_id' => $summer->id],
            ['product_id' => $productId, 'season_id' => $autumn->id],
        ]);

        $param = [
            'name' => 'パイナップル',
            'description' => <<<TEXT
            甘酸っぱさとトロピカルな香りが特徴のパイナップル。
            当店では甘さと酸味のバランスが絶妙な国産のパイナップルを使用しています。
            もぎたてフルーツのスムージをお召し上がりください！
            TEXT,
            'price' => 800,
            'image' => 'pineapple.png',
        ];
        $productId = DB::table('products')->insertGetId($param);
        $spring = Season::where('name', '春')->first();
        $summer = Season::where('name', '夏')->first();
        DB::table('product_season')->insert([
            ['product_id' => $productId, 'season_id' => $spring->id],
            ['product_id' => $productId, 'season_id' => $summer->id],
        ]);

        $param = [
            'name' => 'ブドウ',
            'description' => <<<TEXT
            ブドウの中でも人気の高い国産の「巨峰」を使用しています。
            高い糖度と適度な酸味が魅力で、鮮やかなパープルで見た目も可愛い商品です。
            もぎたてフルーツのスムージーをお召し上がりください！
            TEXT,
            'price' => 1100,
            'image' => 'grapes.png',
        ];
        $productId = DB::table('products')->insertGetId($param);
        $summer = Season::where('name', '夏')->first();
        $autumn = Season::where('name', '秋')->first();
        DB::table('product_season')->insert([
            ['product_id' => $productId, 'season_id' => $summer->id],
            ['product_id' => $productId, 'season_id' => $autumn->id],
        ]);

        $param = [
            'name' => 'バナナ',
            'description' => <<<TEXT
            低カロリーでありながら栄養満点のため、ダイエット中の方にもおすすめの商品です。
            1杯でバナナの濃厚な甘みを存分に堪能できます。
            もぎたてフルーツのスムージーをお召し上がりください！
            TEXT,
            'price' => 600,
            'image' => 'banana.png',
        ];
        $productId = DB::table('products')->insertGetId($param);
        $summer = Season::where('name', '夏')->first();
        DB::table('product_season')->insert([
            ['product_id' => $productId, 'season_id' => $summer->id],
        ]);

        $param = [
            'name' => 'メロン',
            'description' => <<<TEXT
            香りがよくジューシーで品のある甘さが人気のメロンスムージー。
            カリウムが多く含まれているためむくみ解消効果も抜群です。
            もぎたてフルーツのスムージーをお召し上がりください！
            TEXT,
            'price' => 900,
            'image' => 'melon.png',
        ];
        $productId = DB::table('products')->insertGetId($param);
        $spring = Season::where('name', '春')->first();
        $summer = Season::where('name', '夏')->first();
        DB::table('product_season')->insert([
            ['product_id' => $productId, 'season_id' => $spring->id],
            ['product_id' => $productId, 'season_id' => $summer->id],
        ]);
    }
}