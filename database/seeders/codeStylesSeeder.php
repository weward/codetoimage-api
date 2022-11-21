<?php

namespace Database\Seeders;

use App\Models\CodeStyle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeStylesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'a11y-dark',
            'a11y-light',
            'agate',
            'an-old-hope',
            'androidstudio',
            'arduino-light',
            'arta',
            'ascetic',
            'atom-one-dark-reasonable',
            'atom-one-dark',
            'atom-one-light',
            'base16',
            'brown-paper',
            'brown-papersq.png',
            'codepen-embed',
            'color-brewer',
            'dark',
            'default',
            'devibeans',
            'docco',
            'far',
            'felipec',
            'foundation',
            'github-dark-dimmed',
            'github-dark',
            'github',
            'gml',
            'googlecode',
            'gradient-dark',
            'gradient-light',
            'grayscale',
            'hybrid',
            'idea',
            'intellij-light',
            'ir-black',
            'isbl-editor-dark',
            'isbl-editor-light',
            'kimbie-dark',
            'kimbie-light',
            'lightfair',
            'lioshi',
            'magula',
            'mono-blue',
            'monokai-sublime',
            'monokai',
            'night-owl',
            'nnfx-dark',
            'nnfx-light',
            'nord',
            'obsidian',
            'panda-syntax-dark',
            'panda-syntax-light',
            'paraiso-dark',
            'paraiso-light',
            'pojoaque',
            'pojoaque.jpg',
            'purebasic',
            'qtcreator-dark',
            'qtcreator-light',
            'rainbow',
            'routeros',
            'school-book',
            'shades-of-purple',
            'srcery',
            'stackoverflow-dark',
            'stackoverflow-light',
            'sunburst',
            'tokyo-night-dark',
            'tokyo-night-light',
            'tomorrow-night-blue',
            'tomorrow-night-bright',
            'vs',
            'vs2015',
            'xcode',
            'xt256',
        ];

        $now = now()->format('Y-m-d H:i:s');

        $save = [];
        foreach ($data as $d) {
            $save[] =  [
                'name' => $d,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        if (count($save)) {
            CodeStyle::insert($save);
        }

    }
}
