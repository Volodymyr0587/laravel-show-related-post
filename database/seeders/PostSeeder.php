<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $titles = [
        //     'Odit aliquam earum soluta iusto blanditiis voluptate exercitationem culpa corporis, quisquam, impedit quasi dolorem. Reprehenderit ratione repellendus maxime quod doloribus, a alias!',
        //     'Alias minus sunt numquam et, hic tenetur temporibus commodi dicta porro veniam tempora beatae voluptatibus perferendis? Tempore iure recusandae voluptate veritatis iste.',
        //     'Dolores, vel fuga, voluptatum dolorem tempore, quidem consectetur numquam adipisci dicta fugit iusto quos totam deserunt id obcaecati sequi sit. Illo, ut!',
        //     'Explicabo fugiat eum culpa quaerat, eos temporibus vero doloremque qui corporis dolorem consequuntur placeat exercitationem at adipisci expedita inventore praesentium consectetur sed.',
        //     'Magni tenetur vel illo itaque doloremque consequuntur exercitationem totam dignissimos provident. Assumenda temporibus impedit consequuntur alias facere autem accusantium natus ratione maxime.',
        //     'Illum unde quia quae ipsa officiis exercitationem porro magnam ut libero, eum odit. Rerum dolorum ex amet accusamus totam cumque, tempora quam.',
        //     'Libero eius aut omnis eveniet eum deleniti dolores explicabo quo rem aliquid ea quasi consequatur, voluptatem, iusto quia quisquam accusamus similique sint?',
        //     'Qui fuga consectetur consequatur atque blanditiis itaque commodi at, vel ex aliquam corrupti dolore in assumenda ipsum placeat? Temporibus et at magnam!',
        //     'Modi explicabo, natus ut quo, soluta maxime maiores accusantium, quis voluptatem commodi eum excepturi placeat. Magnam voluptates veritatis, rerum ipsa qui incidunt!',
        //     'Ullam pariatur impedit laudantium temporibus architecto error, suscipit illum velit inventore autem unde explicabo culpa mollitia necessitatibus ex magnam doloremque qui tenetur!',
        // ];

        $categories = Category::all();

        for ($i=1; $i <= 20; $i++) {
            Post::create([
                'title' => fake()->sentence(),
                'description' => fake()->paragraphs(3, true),
                'category_id' => $categories->random()->id,
            ]);
        }


    }
}
