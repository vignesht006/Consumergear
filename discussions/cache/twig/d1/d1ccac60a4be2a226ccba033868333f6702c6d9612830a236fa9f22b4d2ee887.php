<?php

/* @vinny_shareon/event/overall_footer_after.html */
class __TwigTemplate_ddf2afb4cdef192e9e5ee2ca20bfc8b2df16ec8b875a81f9ba013c2b1ecebbd6 extends Twig_Template
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
        if (((isset($context["S_SO_STATUS"]) ? $context["S_SO_STATUS"] : null) && (isset($context["S_VIEWTOPIC"]) ? $context["S_VIEWTOPIC"] : null))) {
            // line 2
            echo "\t";
            $asset_file = "@vinny_shareon/popup.js";
            $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper());
            if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
                $asset_path = $asset->get_path();                $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
                if (!file_exists($local_file)) {
                    $local_file = $this->getEnvironment()->findTemplate($asset_path);
                    $asset->set_path($local_file, true);
                $asset->add_assets_version('3');
                $asset_file = $asset->get_url();
                }
            }
            $context['definition']->append('SCRIPTS', '<script type="text/javascript" src="' . $asset_file. '"></script>

');
        }
    }

    public function getTemplateName()
    {
        return "@vinny_shareon/event/overall_footer_after.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  19 => 1,);
    }
}
/* <!-- IF S_SO_STATUS and S_VIEWTOPIC -->*/
/* 	<!-- INCLUDEJS @vinny_shareon/popup.js -->*/
/* <!-- ENDIF -->*/
