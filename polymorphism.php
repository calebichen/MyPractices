<?php
/**
 * Created by PhpStorm.
 * User: caleb
 * Date: 2018/6/24
 * Time: ����11:52
 */

echo "<h2>Practice of Polymorphism</h2>";
echo "<b>Defination of Polymorphism: </b><br>";
echo "Polymorphism describes a pattern in object oriented programming in which classes have different functionality while sharing a common interface.<br>";
echo "This example comes from https://code.tutsplus.com/tutorials/understanding-and-applying-polymorphism-in-php--net-14362 <br>";


class PolyBaseArticle {
    public $title;
    public $author;
    public $date;
    public $category;
 
    public function  __construct($title, $author, $date, $category = 0) {
        $this->title = $title;
        $this->author = $author;
        $this->date = $date;
        $this->category = $category;
    }

    public function write(PolyWriterWriter $writer) {
        return $writer->write($this);
    }
}

interface PolyWriterWriter {
    public function write(PolyBaseArticle $obj);
}

class PolyWriterXMLWriter implements PolyWriterWriter {
    public function write(PolyBaseArticle $obj) {
        $ret = '<article>';
        $ret .= '<title>' . $obj->title . '</title>';
        $ret .= '<author>' . $obj->author . '</author>';
        $ret .= '<date>' . $obj->date . '</date>';
        $ret .= '<category>' . $obj->category . '</category>';
        $ret .= '</article>';
        return $ret;
    }
}

class PolyWriterJSONWriter implements PolyWriterWriter {
    public function write(PolyBaseArticle $obj) {
        $array = array('article' => $obj);
        return json_encode($array);
    }
}

class PolyBaseFactory {
    public static function getWriter() {
        // grab request variable
        $format = @$_REQUEST['format'] or "";
        // construct our class name and check its existence
        $class = 'PolyWriter' . $format . 'Writer';
        if(class_exists($class)) {
            // return a new Writer object
            return new $class();
        }
        // otherwise we fail
        throw new Exception('Unsupported format');
    }
}

// ------- using ------------
$article = new PolyBaseArticle('Polymorphism', 'Steve', time(), 0);
 
try {
    $writer = PolyBaseFactory::getWriter();
}
catch (Exception $e) {
    $writer = new PolyWriterXMLWriter();
}
 
echo $article->write($writer);

