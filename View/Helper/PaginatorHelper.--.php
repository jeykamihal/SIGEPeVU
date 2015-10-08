   <?php
   /**
  3:  * Pagination Helper class file.
  4:  *
  5:  * Generates pagination links
  6:  *
  7:  * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
  8:  * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
  9:  *
 10:  * Licensed under The MIT License
 11:  * Redistributions of files must retain the above copyright notice.
 12:  *
 13:  * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 14:  * @link          http://cakephp.org CakePHP(tm) Project
 15:  * @package       Cake.View.Helper
 16:  * @since         CakePHP(tm) v 1.2.0
 17:  * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 18:  */
  App::uses('AppHelper', 'View/Helper');
  /**
 
 
 23:  * Pagination Helper class for easy generation of pagination links.
 24:  *
 25:  * PaginationHelper encloses all methods needed when working with pagination.
 26:  *
 27:  * @package       Cake.View.Helper
 28:  * @property      HtmlHelper $Html
 29:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html
 30:  */
  class PaginatorHelper extends AppHelper {
  /**
 
 34:  * Helper dependencies
 35:  *
 36:  * @var array
 37:  */
      public $helpers = array('Html');
  /**
 
 41:  * The class used for 'Ajax' pagination links. Defaults to JsHelper.  You should make sure
 42:  * that JsHelper is defined as a helper before PaginatorHelper, if you want to customize the JsHelper.
 43:  *
 44:  * @var string
 45:  */
      protected $_ajaxHelperClass = 'Js';
  
  /**
 49:  * Holds the default options for pagination links
 50:  *
 51:  * The values that may be specified are:
 52:  *
 53:  * - `format` Format of the counter. Supported formats are 'range' and 'pages'
 54:  *    and custom (default). In the default mode the supplied string is parsed and constants are replaced
 55:  *    by their actual values.
 56:  *    placeholders: %page%, %pages%, %current%, %count%, %start%, %end% .
 57:  * - `separator` The separator of the actual page and number of pages (default: ' of ').
 58:  * - `url` Url of the action. See Router::url()
 59:  * - `url['sort']`  the key that the recordset is sorted.
 60:  * - `url['direction']` Direction of the sorting (default: 'asc').
 61:  * - `url['page']` Page number to use in links.
 62:  * - `model` The name of the model.
 63:  * - `escape` Defines if the title field for the link should be escaped (default: true).
 64:  * - `update` DOM id of the element updated with the results of the AJAX call.
 65:  *     If this key isn't specified Paginator will use plain HTML links.
 66:  * - `paging['paramType']` The type of parameters to use when creating links.  Valid options are
 67:  *     'querystring' and 'named'.  See PaginatorComponent::$settings for more information.
 68:  * - `convertKeys` - A list of keys in url arrays that should be converted to querysting params
 69:  *    if paramType == 'querystring'.
 70:  *
 71:  * @var array
 72:  */
      public $options = array(
          'convertKeys' => array('page', 'limit', 'sort', 'direction')
      );
  
  /**
 78:  * Constructor for the helper. Sets up the helper that is used for creating 'AJAX' links.
 79:  *
 80:  * Use `public $helpers = array('Paginator' => array('ajax' => 'CustomHelper'));` to set a custom Helper
 81:  * or choose a non JsHelper Helper.  If you want to use a specific library with JsHelper declare JsHelper and its
 82:  * adapter before including PaginatorHelper in your helpers array.
 83:  *
 84:  * The chosen custom helper must implement a `link()` method.
 85:  *
 86:  * @param View $View the view object the helper is attached to.
 87:  * @param array $settings Array of settings.
 88:  * @throws CakeException When the AjaxProvider helper does not implement a link method.
 89:  */
      public function __construct(View $View, $settings = array()) {
          $ajaxProvider = isset($settings['ajax']) ? $settings['ajax'] : 'Js';
          $this->helpers[] = $ajaxProvider;
          $this->_ajaxHelperClass = $ajaxProvider;
          App::uses($ajaxProvider . 'Helper', 'View/Helper');
          $classname = $ajaxProvider . 'Helper';
          if (!class_exists($classname) || !method_exists($classname, 'link')) {
              throw new CakeException(sprintf(
                  __d('cake_dev', '%s does not implement a link() method, it is incompatible with PaginatorHelper'), $classname
              ));
         }
101:         parent::__construct($View, $settings);
102:     }
103: 
104: /**
105:  * Before render callback. Overridden to merge passed args with url options.
106:  *
107:  * @param string $viewFile
108:  * @return void
109:  */
110:     public function beforeRender($viewFile) {
111:         $this->options['url'] = array_merge($this->request->params['pass'], $this->request->params['named']);
112:         if (!empty($this->request->query)) {
113:             $this->options['url']['?'] = $this->request->query;
114:         }
115:         parent::beforeRender($viewFile);
116:     }
117: 
118: /**
119:  * Gets the current paging parameters from the resultset for the given model
120:  *
121:  * @param string $model Optional model name.  Uses the default if none is specified.
122:  * @return array The array of paging parameters for the paginated resultset.
123:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::params
124:  */
125:     public function params($model = null) {
126:         if (empty($model)) {
127:             $model = $this->defaultModel();
128:         }
129:         if (!isset($this->request->params['paging']) || empty($this->request->params['paging'][$model])) {
130:             return null;
131:         }
132:         return $this->request->params['paging'][$model];
133:     }
134: 
135: /**
136:  * Sets default options for all pagination links
137:  *
138:  * @param array|string $options Default options for pagination links. If a string is supplied - it
139:  *   is used as the DOM id element to update. See PaginatorHelper::$options for list of keys.
140:  * @return void
141:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::options
142:  */
143:     public function options($options = array()) {
144:         if (is_string($options)) {
145:             $options = array('update' => $options);
146:         }
147: 
148:         if (!empty($options['paging'])) {
149:             if (!isset($this->request->params['paging'])) {
150:                 $this->request->params['paging'] = array();
151:             }
152:             $this->request->params['paging'] = array_merge($this->request->params['paging'], $options['paging']);
153:             unset($options['paging']);
154:         }
155:         $model = $this->defaultModel();
156: 
157:         if (!empty($options[$model])) {
158:             if (!isset($this->request->params['paging'][$model])) {
159:                 $this->request->params['paging'][$model] = array();
160:             }
161:             $this->request->params['paging'][$model] = array_merge(
162:                 $this->request->params['paging'][$model], $options[$model]
163:             );
164:             unset($options[$model]);
165:         }
166:         if (!empty($options['convertKeys'])) {
167:             $options['convertKeys'] = array_merge($this->options['convertKeys'], $options['convertKeys']);
168:         }
169:         $this->options = array_filter(array_merge($this->options, $options));
170:     }
171: 
172: /**
173:  * Gets the current page of the recordset for the given model
174:  *
175:  * @param string $model Optional model name.  Uses the default if none is specified.
176:  * @return string The current page number of the recordset.
177:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::current
178:  */
179:     public function current($model = null) {
180:         $params = $this->params($model);
181: 
182:         if (isset($params['page'])) {
183:             return $params['page'];
184:         }
185:         return 1;
186:     }
187: 
188: /**
189:  * Gets the current key by which the recordset is sorted
190:  *
191:  * @param string $model Optional model name.  Uses the default if none is specified.
192:  * @param array $options Options for pagination links. See #options for list of keys.
193:  * @return string The name of the key by which the recordset is being sorted, or
194:  *  null if the results are not currently sorted.
195:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::sortKey
196:  */
197:     public function sortKey($model = null, $options = array()) {
198:         if (empty($options)) {
199:             $params = $this->params($model);
200:             $options = $params['options'];
201:         }
202:         if (isset($options['sort']) && !empty($options['sort'])) {
203:             return $options['sort'];
204:         }
205:         if (isset($options['order'])) {
206:             return is_array($options['order']) ? key($options['order']) : $options['order'];
207:         }
208:         if (isset($params['order'])) {
209:             return is_array($params['order']) ? key($params['order']) : $params['order'];
210:         }
211:         return null;
212:     }
213: 
214: /**
215:  * Gets the current direction the recordset is sorted
216:  *
217:  * @param string $model Optional model name.  Uses the default if none is specified.
218:  * @param array $options Options for pagination links. See #options for list of keys.
219:  * @return string The direction by which the recordset is being sorted, or
220:  *  null if the results are not currently sorted.
221:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::sortDir
222:  */
223:     public function sortDir($model = null, $options = array()) {
224:         $dir = null;
225: 
226:         if (empty($options)) {
227:             $params = $this->params($model);
228:             $options = $params['options'];
229:         }
230: 
231:         if (isset($options['direction'])) {
232:             $dir = strtolower($options['direction']);
233:         } elseif (isset($options['order']) && is_array($options['order'])) {
234:             $dir = strtolower(current($options['order']));
235:         } elseif (isset($params['order']) && is_array($params['order'])) {
236:             $dir = strtolower(current($params['order']));
237:         }
238: 
239:         if ($dir == 'desc') {
240:             return 'desc';
241:         }
242:         return 'asc';
243:     }
244: 
245: /**
246:  * Generates a "previous" link for a set of paged records
247:  *
248:  * ### Options:
249:  *
250:  * - `tag` The tag wrapping tag you want to use, defaults to 'span'
251:  * - `escape` Whether you want the contents html entity encoded, defaults to true
252:  * - `model` The model to use, defaults to PaginatorHelper::defaultModel()
253:  *
254:  * @param string $title Title for the link. Defaults to '<< Previous'.
255:  * @param array $options Options for pagination link. See #options for list of keys.
256:  * @param string $disabledTitle Title when the link is disabled.
257:  * @param array $disabledOptions Options for the disabled pagination link. See #options for list of keys.
258:  * @return string A "previous" link or $disabledTitle text if the link is disabled.
259:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::prev
260:  */
261:     public function prev($title = '<< Previous', $options = array(), $disabledTitle = null, $disabledOptions = array()) {
262:         $defaults = array(
263:             'rel' => 'prev'
264:         );
265:         $options = array_merge($defaults, (array)$options);
266:         return $this->_pagingLink('Prev', $title, $options, $disabledTitle, $disabledOptions);
267:     }
268: 
269: /**
270:  * Generates a "next" link for a set of paged records
271:  *
272:  * ### Options:
273:  *
274:  * - `tag` The tag wrapping tag you want to use, defaults to 'span'
275:  * - `escape` Whether you want the contents html entity encoded, defaults to true
276:  * - `model` The model to use, defaults to PaginatorHelper::defaultModel()
277:  *
278:  * @param string $title Title for the link. Defaults to 'Next >>'.
279:  * @param array $options Options for pagination link. See above for list of keys.
280:  * @param string $disabledTitle Title when the link is disabled.
281:  * @param array $disabledOptions Options for the disabled pagination link. See above for list of keys.
282:  * @return string A "next" link or or $disabledTitle text if the link is disabled.
283:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::next
284:  */
285:     public function next($title = 'Next >>', $options = array(), $disabledTitle = null, $disabledOptions = array()) {
286:         $defaults = array(
287:             'rel' => 'next'
288:         );
289:         $options = array_merge($defaults, (array)$options);
290:         return $this->_pagingLink('Next', $title, $options, $disabledTitle, $disabledOptions);
291:     }
292: 
293: /**
294:  * Generates a sorting link. Sets named parameters for the sort and direction.  Handles
295:  * direction switching automatically.
296:  *
297:  * ### Options:
298:  *
299:  * - `escape` Whether you want the contents html entity encoded, defaults to true
300:  * - `model` The model to use, defaults to PaginatorHelper::defaultModel()
301:  * - `direction` The default direction to use when this link isn't active.
302:  *
303:  * @param string $key The name of the key that the recordset should be sorted.
304:  * @param string $title Title for the link. If $title is null $key will be used
305:  *      for the title and will be generated by inflection.
306:  * @param array $options Options for sorting link. See above for list of keys.
307:  * @return string A link sorting default by 'asc'. If the resultset is sorted 'asc' by the specified
308:  *  key the returned link will sort by 'desc'.
309:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::sort
310:  */
311:     public function sort($key, $title = null, $options = array()) {
312:         $options = array_merge(array('url' => array(), 'model' => null), $options);
313:         $url = $options['url'];
314:         unset($options['url']);
315: 
316:         if (empty($title)) {
317:             $title = $key;
318:             $title = __(Inflector::humanize(preg_replace('/_id$/', '', $title)));
319:         }
320:         $dir = isset($options['direction']) ? $options['direction'] : 'asc';
321:         unset($options['direction']);
322: 
323:         $sortKey = $this->sortKey($options['model']);
324:         $defaultModel = $this->defaultModel();
325:         $isSorted = (
326:             $sortKey === $key ||
327:             $sortKey === $defaultModel . '.' . $key ||
328:             $key === $defaultModel . '.' . $sortKey
329:         );
330: 
331:         if ($isSorted) {
332:             $dir = $this->sortDir($options['model']) === 'asc' ? 'desc' : 'asc';
333:             $class = $dir === 'asc' ? 'desc' : 'asc';
334:             if (!empty($options['class'])) {
335:                 $options['class'] .= ' ' . $class;
336:             } else {
337:                 $options['class'] = $class;
338:             }
339:         }
340:         if (is_array($title) && array_key_exists($dir, $title)) {
341:             $title = $title[$dir];
342:         }
343: 
344:         $url = array_merge(array('sort' => $key, 'direction' => $dir), $url, array('order' => null));
345:         return $this->link($title, $url, $options);
346:     }
347: 
348: /**
349:  * Generates a plain or Ajax link with pagination parameters
350:  *
351:  * ### Options
352:  *
353:  * - `update` The Id of the DOM element you wish to update.  Creates Ajax enabled links
354:  *    with the AjaxHelper.
355:  * - `escape` Whether you want the contents html entity encoded, defaults to true
356:  * - `model` The model to use, defaults to PaginatorHelper::defaultModel()
357:  *
358:  * @param string $title Title for the link.
359:  * @param string|array $url Url for the action. See Router::url()
360:  * @param array $options Options for the link. See #options for list of keys.
361:  * @return string A link with pagination parameters.
362:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::link
363:  */
364:     public function link($title, $url = array(), $options = array()) {
365:         $options = array_merge(array('model' => null, 'escape' => true), $options);
366:         $model = $options['model'];
367:         unset($options['model']);
368: 
369:         if (!empty($this->options)) {
370:             $options = array_merge($this->options, $options);
371:         }
372:         if (isset($options['url'])) {
373:             $url = array_merge((array)$options['url'], (array)$url);
374:             unset($options['url']);
375:         }
376:         unset($options['convertKeys']);
377: 
378:         $url = $this->url($url, true, $model);
379: 
380:         $obj = isset($options['update']) ? $this->_ajaxHelperClass : 'Html';
381:         return $this->{$obj}->link($title, $url, $options);
382:     }
383: 
384: /**
385:  * Merges passed URL options with current pagination state to generate a pagination URL.
386:  *
387:  * @param array $options Pagination/URL options array
388:  * @param boolean $asArray Return the url as an array, or a URI string
389:  * @param string $model Which model to paginate on
390:  * @return mixed By default, returns a full pagination URL string for use in non-standard contexts (i.e. JavaScript)
391:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::url
392:  */
393:     public function url($options = array(), $asArray = false, $model = null) {
394:         $paging = $this->params($model);
395:         $url = array_merge(array_filter($paging['options']), $options);
396: 
397:         if (isset($url['order'])) {
398:             $sort = $direction = null;
399:             if (is_array($url['order'])) {
400:                 list($sort, $direction) = array($this->sortKey($model, $url), current($url['order']));
401:             }
402:             unset($url['order']);
403:             $url = array_merge($url, compact('sort', 'direction'));
404:         }
405:         $url = $this->_convertUrlKeys($url, $paging['paramType']);
406: 
407:         if ($asArray) {
408:             return $url;
409:         }
410:         return parent::url($url);
411:     }
412: 
413: /**
414:  * Converts the keys being used into the format set by options.paramType
415:  *
416:  * @param array $url Array of url params to convert
417:  * @param string $type
418:  * @return array converted url params.
419:  */
420:     protected function _convertUrlKeys($url, $type) {
421:         if ($type == 'named') {
422:             return $url;
423:         }
424:         if (!isset($url['?'])) {
425:             $url['?'] = array();
426:         }
427:         foreach ($this->options['convertKeys'] as $key) {
428:             if (isset($url[$key])) {
429:                 $url['?'][$key] = $url[$key];
430:                 unset($url[$key]);
431:             }
432:         }
433:         return $url;
434:     }
435: 
436: /**
437:  * Protected method for generating prev/next links
438:  *
439:  * @param string $which
440:  * @param string $title
441:  * @param array $options
442:  * @param string $disabledTitle
443:  * @param array $disabledOptions
444:  * @return string
445:  */
446:     protected function _pagingLink($which, $title = null, $options = array(), $disabledTitle = null, $disabledOptions = array()) {
447:         $check = 'has' . $which;
448:         $_defaults = array(
449:             'url' => array(), 'step' => 1, 'escape' => true,
450:             'model' => null, 'tag' => 'span', 'class' => strtolower($which)
451:         );
452:         $options = array_merge($_defaults, (array)$options);
453:         $paging = $this->params($options['model']);
454:         if (empty($disabledOptions)) {
455:             $disabledOptions = $options;
456:         }
457: 
458:         if (!$this->{$check}($options['model']) && (!empty($disabledTitle) || !empty($disabledOptions))) {
459:             if (!empty($disabledTitle) && $disabledTitle !== true) {
460:                 $title = $disabledTitle;
461:             }
462:             $options = array_merge($_defaults, (array)$disabledOptions);
463:         } elseif (!$this->{$check}($options['model'])) {
464:             return null;
465:         }
466: 
467:         foreach (array_keys($_defaults) as $key) {
468:             ${$key} = $options[$key];
469:             unset($options[$key]);
470:         }
471:         $url = array_merge(array('page' => $paging['page'] + ($which == 'Prev' ? $step * -1 : $step)), $url);
472: 
473:         if ($this->{$check}($model)) {
474:             return $this->Html->tag($tag, $this->link($title, $url, array_merge($options, compact('escape', 'model'))), compact('class'));
475:         } else {
476:             unset($options['rel']);
477:             return $this->Html->tag($tag, $title, array_merge($options, compact('escape', 'class')));
478:         }
479:     }
480: 
481: /**
482:  * Returns true if the given result set is not at the first page
483:  *
484:  * @param string $model Optional model name. Uses the default if none is specified.
485:  * @return boolean True if the result set is not at the first page.
486:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::hasPrev
487:  */
488:     public function hasPrev($model = null) {
489:         return $this->_hasPage($model, 'prev');
490:     }
491: 
492: /**
493:  * Returns true if the given result set is not at the last page
494:  *
495:  * @param string $model Optional model name.  Uses the default if none is specified.
496:  * @return boolean True if the result set is not at the last page.
497:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::hasNext
498:  */
499:     public function hasNext($model = null) {
500:         return $this->_hasPage($model, 'next');
501:     }
502: 
503: /**
504:  * Returns true if the given result set has the page number given by $page
505:  *
506:  * @param string $model Optional model name.  Uses the default if none is specified.
507:  * @param integer $page The page number - if not set defaults to 1.
508:  * @return boolean True if the given result set has the specified page number.
509:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::hasPage
510:  */
511:     public function hasPage($model = null, $page = 1) {
512:         if (is_numeric($model)) {
513:             $page = $model;
514:             $model = null;
515:         }
516:         $paging = $this->params($model);
517:         return $page <= $paging['pageCount'];
518:     }
519: 
520: /**
521:  * Does $model have $page in its range?
522:  *
523:  * @param string $model Model name to get parameters for.
524:  * @param integer $page Page number you are checking.
525:  * @return boolean Whether model has $page
526:  */
527:     protected function _hasPage($model, $page) {
528:         $params = $this->params($model);
529:         if (!empty($params)) {
530:             if ($params["{$page}Page"] == true) {
531:                 return true;
532:             }
533:         }
534:         return false;
535:     }
536: 
537: /**
538:  * Gets the default model of the paged sets
539:  *
540:  * @return string Model name or null if the pagination isn't initialized.
541:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::defaultModel
542:  */
543:     public function defaultModel() {
544:         if ($this->_defaultModel != null) {
545:             return $this->_defaultModel;
546:         }
547:         if (empty($this->request->params['paging'])) {
548:             return null;
549:         }
550:         list($this->_defaultModel) = array_keys($this->request->params['paging']);
551:         return $this->_defaultModel;
552:     }
553: 
554: /**
555:  * Returns a counter string for the paged result set
556:  *
557:  * ### Options
558:  *
559:  * - `model` The model to use, defaults to PaginatorHelper::defaultModel();
560:  * - `format` The format string you want to use, defaults to 'pages' Which generates output like '1 of 5'
561:  *    set to 'range' to generate output like '1 - 3 of 13'.  Can also be set to a custom string, containing
562:  *    the following placeholders `{:page}`, `{:pages}`, `{:current}`, `{:count}`, `{:model}`, `{:start}`, `{:end}` and any
563:  *    custom content you would like.
564:  * - `separator` The separator string to use, default to ' of '
565:  *
566:  * The `%page%` style placeholders also work, but are deprecated and will be removed in a future version.
567:  * @param array $options Options for the counter string. See #options for list of keys.
568:  * @return string Counter string.
569:  * @deprecated The %page% style placeholders are deprecated.
570:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::counter
571:  */
572:     public function counter($options = array()) {
573:         if (is_string($options)) {
574:             $options = array('format' => $options);
575:         }
576: 
577:         $options = array_merge(
578:             array(
579:                 'model' => $this->defaultModel(),
580:                 'format' => 'pages',
581:                 'separator' => __d('cake', ' of ')
582:             ),
583:         $options);
584: 
585:         $paging = $this->params($options['model']);
586:         if ($paging['pageCount'] == 0) {
587:             $paging['pageCount'] = 1;
588:         }
589:         $start = 0;
590:         if ($paging['count'] >= 1) {
591:             $start = (($paging['page'] - 1) * $paging['limit']) + 1;
592:         }
593:         $end = $start + $paging['limit'] - 1;
594:         if ($paging['count'] < $end) {
595:             $end = $paging['count'];
596:         }
597: 
598:         switch ($options['format']) {
599:             case 'range':
600:                 if (!is_array($options['separator'])) {
601:                     $options['separator'] = array(' - ', $options['separator']);
602:                 }
603:                 $out = $start . $options['separator'][0] . $end . $options['separator'][1];
604:                 $out .= $paging['count'];
605:             break;
606:             case 'pages':
607:                 $out = $paging['page'] . $options['separator'] . $paging['pageCount'];
608:             break;
609:             default:
610:                 $map = array(
611:                     '%page%' => $paging['page'],
612:                     '%pages%' => $paging['pageCount'],
613:                     '%current%' => $paging['current'],
614:                     '%count%' => $paging['count'],
615:                     '%start%' => $start,
616:                     '%end%' => $end,
617:                     '%model%' => strtolower(Inflector::humanize(Inflector::tableize($options['model'])))
618:                 );
619:                 $out = str_replace(array_keys($map), array_values($map), $options['format']);
620: 
621:                 $newKeys = array(
622:                     '{:page}', '{:pages}', '{:current}', '{:count}', '{:start}', '{:end}', '{:model}'
623:                 );
624:                 $out = str_replace($newKeys, array_values($map), $out);
625:             break;
626:         }
627:         return $out;
628:     }
629: 
630: /**
631:  * Returns a set of numbers for the paged result set
632:  * uses a modulus to decide how many numbers to show on each side of the current page (default: 8).
633:  *
634:  * `$this->Paginator->numbers(array('first' => 2, 'last' => 2));`
635:  *
636:  * Using the first and last options you can create links to the beginning and end of the page set.
637:  *
638:  * ### Options
639:  *
640:  * - `before` Content to be inserted before the numbers
641:  * - `after` Content to be inserted after the numbers
642:  * - `model` Model to create numbers for, defaults to PaginatorHelper::defaultModel()
643:  * - `modulus` how many numbers to include on either side of the current page, defaults to 8.
644:  * - `separator` Separator content defaults to ' | '
645:  * - `tag` The tag to wrap links in, defaults to 'span'
646:  * - `first` Whether you want first links generated, set to an integer to define the number of 'first'
647:  *    links to generate.
648:  * - `last` Whether you want last links generated, set to an integer to define the number of 'last'
649:  *    links to generate.
650:  * - `ellipsis` Ellipsis content, defaults to '...'
651:  * - `class` Class for wrapper tag
652:  * - `currentClass` Class for wrapper tag on current active page, defaults to 'current'
653:  *
654:  * @param array $options Options for the numbers, (before, after, model, modulus, separator)
655:  * @return string numbers string.
656:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::numbers
657:  */
658:     public function numbers($options = array()) {
659:         if ($options === true) {
660:             $options = array(
661:                 'before' => ' | ', 'after' => ' | ', 'first' => 'first', 'last' => 'last'
662:             );
663:         }
664: 
665:         $defaults = array(
666:             'tag' => 'span', 'before' => null, 'after' => null, 'model' => $this->defaultModel(), 'class' => null,
667:             'modulus' => '8', 'separator' => ' | ', 'first' => null, 'last' => null, 'ellipsis' => '...', 'currentClass' => 'current'
668:         );
669:         $options += $defaults;
670: 
671:         $params = (array)$this->params($options['model']) + array('page' => 1);
672:         unset($options['model']);
673: 
674:         if ($params['pageCount'] <= 1) {
675:             return false;
676:         }
677: 
678:         extract($options);
679:         unset($options['tag'], $options['before'], $options['after'], $options['model'],
680:             $options['modulus'], $options['separator'], $options['first'], $options['last'],
681:             $options['ellipsis'], $options['class'], $options['currentClass']
682:         );
683: 
684:         $out = '';
685: 
686:         if ($modulus && $params['pageCount'] > $modulus) {
687:             $half = intval($modulus / 2);
688:             $end = $params['page'] + $half;
689: 
690:             if ($end > $params['pageCount']) {
691:                 $end = $params['pageCount'];
692:             }
693:             $start = $params['page'] - ($modulus - ($end - $params['page']));
694:             if ($start <= 1) {
695:                 $start = 1;
696:                 $end = $params['page'] + ($modulus - $params['page']) + 1;
697:             }
698: 
699:             if ($first && $start > 1) {
700:                 $offset = ($start <= (int)$first) ? $start - 1 : $first;
701:                 if ($offset < $start - 1) {
702:                     $out .= $this->first($offset, compact('tag', 'separator', 'ellipsis', 'class'));
703:                 } else {
704:                     $out .= $this->first($offset, compact('tag', 'separator', 'class', 'ellipsis') + array('after' => $separator));
705:                 }
706:             }
707: 
708:             $out .= $before;
709: 
710:             for ($i = $start; $i < $params['page']; $i++) {
711:                 $out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), compact('class')) . $separator;
712:             }
713: 
714:             if ($class) {
715:                 $currentClass .= ' ' . $class;
716:             }
717:             $out .= $this->Html->tag($tag, $params['page'], array('class' => $currentClass));
718:             if ($i != $params['pageCount']) {
719:                 $out .= $separator;
720:             }
721: 
722:             $start = $params['page'] + 1;
723:             for ($i = $start; $i < $end; $i++) {
724:                 $out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), compact('class')) . $separator;
725:             }
726: 
727:             if ($end != $params['page']) {
728:                 $out .= $this->Html->tag($tag, $this->link($i, array('page' => $end), $options), compact('class'));
729:             }
730: 
731:             $out .= $after;
732: 
733:             if ($last && $end < $params['pageCount']) {
734:                 $offset = ($params['pageCount'] < $end + (int)$last) ? $params['pageCount'] - $end : $last;
735:                 if ($offset <= $last && $params['pageCount'] - $end > $offset) {
736:                     $out .= $this->last($offset, compact('tag', 'separator', 'ellipsis', 'class'));
737:                 } else {
738:                     $out .= $this->last($offset, compact('tag', 'separator', 'class', 'ellipsis') + array('before' => $separator));
739:                 }
740:             }
741: 
742:         } else {
743:             $out .= $before;
744: 
745:             for ($i = 1; $i <= $params['pageCount']; $i++) {
746:                 if ($i == $params['page']) {
747:                     if ($class) {
748:                         $currentClass .= ' ' . $class;
749:                     }
750:                     $out .= $this->Html->tag($tag, $i, array('class' => $currentClass));
751:                 } else {
752:                     $out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), compact('class'));
753:                 }
754:                 if ($i != $params['pageCount']) {
755:                     $out .= $separator;
756:                 }
757:             }
758: 
759:             $out .= $after;
760:         }
761: 
762:         return $out;
763:     }
764: 
765: /**
766:  * Returns a first or set of numbers for the first pages.
767:  *
768:  * `echo $this->Paginator->first('< first');`
769:  *
770:  * Creates a single link for the first page.  Will output nothing if you are on the first page.
771:  *
772:  * `echo $this->Paginator->first(3);`
773:  *
774:  * Will create links for the first 3 pages, once you get to the third or greater page. Prior to that
775:  * nothing will be output.
776:  *
777:  * ### Options:
778:  *
779:  * - `tag` The tag wrapping tag you want to use, defaults to 'span'
780:  * - `after` Content to insert after the link/tag
781:  * - `model` The model to use defaults to PaginatorHelper::defaultModel()
782:  * - `separator` Content between the generated links, defaults to ' | '
783:  * - `ellipsis` Content for ellipsis, defaults to '...'
784:  *
785:  * @param string|integer $first if string use as label for the link. If numeric, the number of page links
786:  *   you want at the beginning of the range.
787:  * @param array $options An array of options.
788:  * @return string numbers string.
789:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::first
790:  */
791:     public function first($first = '<< first', $options = array()) {
792:         $options = array_merge(
793:             array(
794:                 'tag' => 'span',
795:                 'after' => null,
796:                 'model' => $this->defaultModel(),
797:                 'separator' => ' | ',
798:                 'ellipsis' => '...',
799:                 'class' => null
800:             ),
801:         (array)$options);
802: 
803:         $params = array_merge(array('page' => 1), (array)$this->params($options['model']));
804:         unset($options['model']);
805: 
806:         if ($params['pageCount'] <= 1) {
807:             return false;
808:         }
809:         extract($options);
810:         unset($options['tag'], $options['after'], $options['model'], $options['separator'], $options['ellipsis'], $options['class']);
811: 
812:         $out = '';
813: 
814:         if (is_int($first) && $params['page'] >= $first) {
815:             if ($after === null) {
816:                 $after = $ellipsis;
817:             }
818:             for ($i = 1; $i <= $first; $i++) {
819:                 $out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), compact('class'));
820:                 if ($i != $first) {
821:                     $out .= $separator;
822:                 }
823:             }
824:             $out .= $after;
825:         } elseif ($params['page'] > 1 && is_string($first)) {
826:             $options += array('rel' => 'first');
827:             $out = $this->Html->tag($tag, $this->link($first, array('page' => 1), $options), compact('class')) . $after;
828:         }
829:         return $out;
830:     }
831: 
832: /**
833:  * Returns a last or set of numbers for the last pages.
834:  *
835:  * `echo $this->Paginator->last('last >');`
836:  *
837:  * Creates a single link for the last page.  Will output nothing if you are on the last page.
838:  *
839:  * `echo $this->Paginator->last(3);`
840:  *
841:  * Will create links for the last 3 pages.  Once you enter the page range, no output will be created.
842:  *
843:  * ### Options:
844:  *
845:  * - `tag` The tag wrapping tag you want to use, defaults to 'span'
846:  * - `before` Content to insert before the link/tag
847:  * - `model` The model to use defaults to PaginatorHelper::defaultModel()
848:  * - `separator` Content between the generated links, defaults to ' | '
849:  * - `ellipsis` Content for ellipsis, defaults to '...'
850:  *
851:  * @param string|integer $last if string use as label for the link, if numeric print page numbers
852:  * @param array $options Array of options
853:  * @return string numbers string.
854:  * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::last
855:  */
856:     public function last($last = 'last >>', $options = array()) {
857:         $options = array_merge(
858:             array(
859:                 'tag' => 'span',
860:                 'before' => null,
861:                 'model' => $this->defaultModel(),
862:                 'separator' => ' | ',
863:                 'ellipsis' => '...',
864:                 'class' => null
865:             ),
866:         (array)$options);
867: 
868:         $params = array_merge(array('page' => 1), (array)$this->params($options['model']));
869:         unset($options['model']);
870: 
871:         if ($params['pageCount'] <= 1) {
872:             return false;
873:         }
874: 
875:         extract($options);
876:         unset($options['tag'], $options['before'], $options['model'], $options['separator'], $options['ellipsis'], $options['class']);
877: 
878:         $out = '';
879:         $lower = $params['pageCount'] - $last + 1;
880: 
881:         if (is_int($last) && $params['page'] <= $lower) {
882:             if ($before === null) {
883:                 $before = $ellipsis;
884:             }
885:             for ($i = $lower; $i <= $params['pageCount']; $i++) {
886:                 $out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), compact('class'));
887:                 if ($i != $params['pageCount']) {
888:                     $out .= $separator;
889:                 }
890:             }
891:             $out = $before . $out;
892:         } elseif ($params['page'] < $params['pageCount'] && is_string($last)) {
893:             $options += array('rel' => 'last');
894:             $out = $before . $this->Html->tag(
895:                 $tag, $this->link($last, array('page' => $params['pageCount']), $options), compact('class')
896:             );
897:         }
898:         return $out;
899:     }
900: 
901: }