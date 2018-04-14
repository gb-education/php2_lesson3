<?php

/* footer.tpl */
class __TwigTemplate_456d56bc9b1b5d4f086a8cd73d3361b15b2c9585442972089c0671cde799f327 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "</body>
</html>";
    }

    public function getTemplateName()
    {
        return "footer.tpl";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "footer.tpl", "D:\\OpenServer\\domains\\gb-education\\php2_lesson3\\templates\\footer.tpl");
    }
}
