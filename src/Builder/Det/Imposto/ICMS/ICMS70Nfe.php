<?php namespace PhpNFe\NFe\Builder\Det\Imposto\ICMS;

class ICMS70Nfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Origem da mercadoria.
     * 0 - Nacional, exceto as indicadas nos códigos 3, 4, 5 e 8;
     * 1 - Estrangeira - Importação direta, exceto a indicada no código
     * 6;
     * 2 - Estrangeira - Adquirida no mercado interno, exceto a
     * indicada no código 7;
     * 3 - Nacional, mercadoria ou bem com Conteúdo de Importação
     * superior a 40% e inferior ou igual a 70%;
     * 4 - Nacional, cuja produção tenha sido feita em conformidade
     * com os processos produtivos básicos de que tratam as
     * legislações citadas nos Ajustes;
     * 5 - Nacional, mercadoria ou bem com Conteúdo de Importação
     * inferior ou igual a 40%;
     * 6 - Estrangeira - Importação direta, sem similar nacional,
     * constante em lista da CAMEX e gás natural;
     * 7 - Estrangeira - Adquirida no mercado interno, sem similar
     * nacional, constante lista CAMEX e gás natural.
     * 8 - Nacional, mercadoria ou bem com Conteúdo de Importação
     * superior a 70%;.
     * @var string
     * @max 1
     */
    public $orig = '';

    /**
     * Tributação do ICMS = 70.
     * 70=Com redução de base de cálculo e cobrança do ICMS por
     * substituição tributária.
     * @var string
     * @max 2
     */
    public $CST = '';

    /**
     * Modalidade de determinação da BC do
     * ICMS.
     * 0=Margem Valor Agregado (%);
     * 1=Pauta (Valor);
     * 2=Preço Tabelado Máx. (valor);
     * 3=Valor da operação.
     * @var string
     * @max 1
     */
    public $modBC = '';

    /**
     * Percentual da Redução de BC.
     * @var float
     * @dec 4
     */
    public $pRedBC = null;

    /**
     * Valor da BC do ICMS.
     * @dec 2
     * @var float
     */
    public $vBC = 0.00;

    /**
     * Alíquota do imposto.
     * @var float
     * @dec 4
     */
    public $pICMS = '';

    /**
     * Valor do ICMS.
     * @var float
     * @dec 2
     */
    public $vICMS = 0.00;

    /**
     * Modalidade de determinação da BC do
     * ICMS ST.
     * 0=Preço tabelado ou máximo sugerido;
     * 1=Lista Negativa (valor);
     * 2=Lista Positiva (valor);
     * 3=Lista Neutra (valor);
     * 4=Margem Valor Agregado (%);
     * 5=Pauta (valor);.
     * @var string
     * @max 1
     */
    public $modBCST = '';

    /**
     * Percentual da margem de valor Adicionado
     * do ICMS ST.
     * @var float|null
     * @dec 4
     */
    public $pMVAST = null;

    /**
     * Percentual da Redução de BC do ICMS ST.
     * @var float|null
     * @dec 4
     */
    public $pRedBCST = null;

    /**
     * Valor da BC do ICMS ST.
     * @var float
     * @dec 2
     */
    public $vBCST = 0.00;

    /**
     * Alíquota do imposto do ICMS ST.
     * @var float
     * @dec 4
     */
    public $pICMSST = 0.00;

    /**
     * Valor do ICMS ST.
     * Valor do ICMS ST retido.
     * @var float
     * @dec 2
     */
    public $vICMSST = 0.00;

    /**
     * Valor do ICMS desonerado.
     * Informar apenas nos motivos de desoneração documentados
     * abaixo.
     * @var float
     * @dec 2
     */
    public $vICMSDeson = 0.00;

    /**
     * Motivo da desoneração do ICMS.
     * 2 Campo será preenchido quando o campo anterior estiver
     * preenchido. Informar o motivo da desoneração:
     * 3=Uso na agropecuária;
     * 9=Outros;
     * 12=Órgão de fomento e desenvolvimento agropecuário.
     * @var string
     * @max 2
     */
    public $motDesICMS = '';
}