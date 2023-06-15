<?php
class Carrinho
{
    public $carrinho = [];
    
    public function adicionar($valor)
    {
        // var_dump($this->carrinho);


        $achou = 0;
        for($i=0; $i<count($this->carrinho); $i++)
        {
            if ($this->carrinho[$i]['item'] == $valor['item'])
            {
                $achou = 1;
                $this->carrinho[$i]['quant_carrinho'] = $this->carrinho[$i]['quant_carrinho'] + 1;
            }
        } 

        if ($achou == 0) 
        {
            $valor['quant_carrinho'] = 1;
            $this->carrinho[] = $valor;
        }
        $_SESSION['carrinho'] = $this->carrinho;
    }

    public function remover($valor)
    {

        for($i=0; $i<count($this->carrinho); $i++)
        {
            if ($this->carrinho[$i]['item'] == $valor['item'])
            {
 
                if($this->carrinho[$i]['quant_carrinho'] <= 1){
                    unset($this->carrinho[$i]);
                }
                if($this->carrinho[$i]['quant_carrinho'] > 1){
                    $this->carrinho[$i]['quant_carrinho'] = $this->carrinho[$i]['quant_carrinho'] - 1;
                }
            }
        } 

        $_SESSION['carrinho'] = $this->carrinho;
    }
}
?>