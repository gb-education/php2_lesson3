<?php

/* header.tpl */
class __TwigTemplate_322dddd2b9e1c57ebd54c2ada5edd9a767ef5ab48f94e919290efdbca84db1ae extends Twig_Template
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
        echo "<!doctype html>
<html lang=\"ru\">
<head>
\t<meta charset=\"utf-8\">
\t<title>PHP 2 Lesson 3</title>
\t<link rel=\"stylesheet\" href=\"css/style.css\">
</head>
<body>";
    }

    public function getTemplateName()
    {
        return "header.tpl";
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
        return new Twig_Source("", "header.tpl", "D:\\OpenServer\\domains\\gb-education\\php2_lesson3\\templates\\header.tpl");
    }
}
