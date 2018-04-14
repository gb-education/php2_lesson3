<?php

/* index.tpl */
class __TwigTemplate_d1aac6921e147ddb7d036e99e722a5d5943c17ef3cc6eeea80af340ef3d2424b extends Twig_Template
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
        $this->loadTemplate("header.tpl", "index.tpl", 1)->display($context);
        // line 2
        echo "
\t<div class=\"gallery\">

\t\t";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data_img"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 6
            echo "\t\t\t<a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url_img", array()), "html", null, true);
            echo "\" target=\"_blank\">
\t\t\t\t<img src=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url_img_cropped", array()), "html", null, true);
            echo "\">
\t\t\t</a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "
\t</div>
\t<div class=\"upload\">
\t\t<form action=\"/\" method=\"POST\" enctype=\"multipart/form-data\">
\t\t\t<input type=\"file\" name=\"userfile[]\" multiple><br><br>
\t\t\t<input type=\"submit\" name=\"upload\" value=\"Загрузить\">
\t\t</form>
\t</div>

";
        // line 19
        $this->loadTemplate("footer.tpl", "index.tpl", 19)->display($context);
    }

    public function getTemplateName()
    {
        return "index.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 19,  44 => 10,  35 => 7,  30 => 6,  26 => 5,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.tpl", "D:\\OpenServer\\domains\\gb-education\\php2_lesson3\\templates\\index.tpl");
    }
}
