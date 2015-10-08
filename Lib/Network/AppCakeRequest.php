<?php
/**
 * A class that helps wrap Request information and particulars about a single request.
 * Provides methods commonly used to introspect on the request headers and request body.
 *
 * Has both an Array and Object interface. You can access framework parameters using indexes:
 *
 * `$request['controller']` or `$request->controller`.
 *
 * @package       Cake.Network
 */
class AppCakeRequest extends CakeRequest {

/**
 * Check whether or not a Request is a certain type. Uses the built in detection rules
 * as well as additional rules defined with CakeRequest::addDetector(). Any detector can be called
 * as `is($type)` or `is$Type()`.
 *
 * @param string $type The type of request you want to check.
 * @return boolean Whether or not the request is the type you are checking.
 */
    public function is($type) {
        //add str
        if (is_array($type)) {
            $result = array_map(array($this, 'is'), $type);
            return count(array_filter($result)) > 0;
        }
        //add end
        $type = strtolower($type);
        if (!isset($this->_detectors[$type])) {
            return false;
        }
        $detect = $this->_detectors[$type];
        if (isset($detect['env'])) {
            if (isset($detect['value'])) {
                return env($detect['env']) == $detect['value'];
            }
            if (isset($detect['pattern'])) {
                return (bool)preg_match($detect['pattern'], env($detect['env']));
            }
            if (isset($detect['options'])) {
                $pattern = '/' . implode('|', $detect['options']) . '/i';
                return (bool)preg_match($pattern, env($detect['env']));
            }
        }
        if (isset($detect['param'])) {
            $key = $detect['param'];
            $value = $detect['value'];
            return isset($this->params[$key]) ? $this->params[$key] == $value : false;
        }
        if (isset($detect['callback']) && is_callable($detect['callback'])) {
            return call_user_func($detect['callback'], $this);
        }
        return false;
    }
    
}