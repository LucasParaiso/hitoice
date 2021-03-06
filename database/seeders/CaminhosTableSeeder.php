<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaminhosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('caminhos')->insert([
            [
                'titulo' => 'Roses',
                'descricao' => 'As guerreiras Roses têm um estilo agressivo de manuseio, focando sempre em terminar o combate de modo rápido, por mais que percam muita precisão em seus golpes devido à alta concentração de força em seus músculos bem desenvolvidos.
                <br><br>
                <strong>O MANEJO DEVOTO:</strong> o estilo de combate das guerreiras Roses troca chance de acerto por dano bruto. Receba permanentemente +1 de dano (somando-o à sua katana), mas todos os seus testes de combate receberão uma penalidade de -2.',
            ],
            [
                'titulo' => 'Humanos',
                'descricao' => 'Os humanos trocam dano bruto por dano crítico.
                <br><br>
                <strong>O CORTE DAS MONTANHAS:</strong> o estilo de combate dos humanos baseia-se em aproveitar-se de suas estruturas corporais frágeis para enganar inimigos com ataques diretos, mas que na verdade buscam atingir o cerne de pontos fracos. O dano com esse estilo de combate não pode nunca ser superior a 2. Em compensação, os resultados 17, 18 e 19 (assim como o 20) no d20 tornam-se acertos críticos.',
            ],
            [
                'titulo' => 'Dobuu',
                'descricao' => 'Os Dobuu têm coragem e um corpo muito versátil. Isso faz com que não tenham medo de encarar os inimigos de frente, o que também se torna uma desvantagem, já que eles não pensam em atingir pontos críticos.
                <br><br>
                <strong>PRESAS VORAZES:</strong> os que utilizam esse estilo de combate sempre acertam ataques básicos (os ataques simples de Rank F). Contudo, são incapazes de causar danos críticos, independentemente de outros efeitos dizerem o contrário disso.',
            ],
            [
                'titulo' => 'Minu',
                'descricao' => 'Os Minu utilizam técnicas e encantamentos rúnicos para entrar em combate. Isso faz com que seu estilo seja o mais "mágico" dentre os mundos
                <br><br>
                <strong>RUNA DE COMBATE - POSTURA DO VIGOR:</strong> o personagem recebe a habilidade passiva de nunca sofrer dano crítico recebido de inimigos. Além disso, a cada dano crítico que causar a inimigos, pode recuperar-se de 1 dano que tenha sofrido.',
            ],
            [
                'titulo' => 'Yin',
                'descricao' => 'O estilo dos Yin é altamente habilidoso, mas esconde um truque secreto fruto de uma raiva incontrolável. Ativam seu modo secreto APENAS quando são atingidos por um dano crítico.
                <br><br>
                <strong>A LÂMINA BRUTAL:</strong> anula o próximo turno inimigo quando acertar um golpe/habilidade/modo elemental de Rank B ou S.',
            ],
            [
                'titulo' => 'Yang',
                'descricao' => 'O estilo dos Yang consiste em manter a calma. Porém, são destemidos e dificilmente recuariam de um confronto contra um inimigo mais poderoso.
                <br><br>
                <strong>A PERSISTÊNCIA DOS LEÕES:</strong> ativa APENAS quando enfrentar um inimigo mais forte que o seu personagem (que seja capaz de causar mais dano que a katana do seu personagem) durante esse combate, você pode receber 2 danos extras sem que eles constem nos seus estados de vida.',
            ],
        ]);
    }
}
