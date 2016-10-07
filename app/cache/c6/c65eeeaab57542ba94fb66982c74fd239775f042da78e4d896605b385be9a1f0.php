<?php

/* index.html */
class __TwigTemplate_d8e4b8cfe8ed91314045c5ef00d83054619aac54cccc78c35c8b1f4dfe53fcda extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<title>test</title>
\t<link rel=\"stylesheet\" href=\"\">
</head>
<body>
\t";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["data"]) ? $context["data"] : null), "html", null, true);
        echo "
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 10,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/* 	<meta charset="utf-8">*/
/* 	<meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/* 	<title>test</title>*/
/* 	<link rel="stylesheet" href="">*/
/* </head>*/
/* <body>*/
/* 	{{ data }}*/
/* </body>*/
/* </html>*/
