<?php
##########################################################################
# Copyright (C) 2010  Markus Malkusch <markus@malkusch.de>              #
#                                                                       #
# This program is free software: you can redistribute it and/or modify  #
# it under the terms of the GNU General Public License as published by  #
# the Free Software Foundation, either version 3 of the License, or     #
# (at your option) any later version.                                   #
#                                                                       #
# This program is distributed in the hope that it will be useful,       #
# but WITHOUT ANY WARRANTY; without even the implied warranty of        #
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         #
# GNU General Public License for more details.                          #
#                                                                       #
# You should have received a copy of the GNU General Public License     #
# along with this program.  If not, see <http://www.gnu.org/licenses/>. #
#########################################################################


/**
 * A helper for Autoloader tests.
 * 
 * @package autoloader
 * @subpackage test
 * @author Markus Malkusch <markus@malkusch.de>
 * @copyright Copyright (C) 2010 Markus Malkusch
 * @version 1.0
 */
class AutoloaderTestHelper {
	
	
	const CLASS_DIRECTORY = "testClasses";
	
	
    static public function __static() {
        if (! file_exists(self::getClassDirectory())) {
            mkdir(self::getClassDirectory());
            
        }
    }
    
    
    /**
     * @return String
     */
    static public function getClassDirectory() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . self::CLASS_DIRECTORY;
    }
    
    
    public function assertLoadable($class) {
        try {
            new ReflectionClass($class);
          
        } catch (ReflectionException $e) {
            $this->fail("class $class is not loadable.");
            
        }
    }
    
    
    public function assertNotLoadable($class) {
        try {
            new ReflectionClass($class);
            new $class();
            $this->fail("class $class is loadable.");
          
        } catch (AutoloaderException_SearchFailed $e) {
            // expected
            
        } catch (AutoloaderException_InternalClassNotLoadable $e) {
            // expected
            
        } catch (ReflectionException $e) {
            // expected
        }
    }
    
    
    public function makeClass($name, $directory, $definition = "<?php class %name%{}?>") {
        $name     .= uniqid();
        $directory = self::getClassDirectory() . DIRECTORY_SEPARATOR . $directory;
        $path      = $directory . DIRECTORY_SEPARATOR . "$name.test.php";
        
        if (file_exists($path)) {
            return $name;
            
        }
        
        if (! file_exists($directory)) {
            mkdir($directory, 0777, true);
            
        }
        $definition = str_replace("%name%", $name, $definition);
        file_put_contents($path, $definition);
        
        return $name;
    }

    
}