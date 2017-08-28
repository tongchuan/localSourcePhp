<?php
class redisController extends baseController{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$list[]=array('url' => './conn', 'name'=>'链接');
		$list[]=array('url' => './rlist', 'name'=>'列表');
		$list[]=array('url' => './rkeys', 'name'=>'Keys');
		$list[]=array('url' => './del', 'name'=>'del');
		$list[]=array('url' => './keys', 'name'=>'keys');
		$list[]=array('url' => './randomkey', 'name'=>'randomkey');
		$list[]=array('url' => './ttl', 'name'=>'ttl');
		$list[]=array('url' => './exists', 'name'=>'exists');
		$list[]=array('url' => './move', 'name'=>'move');
		$list[]=array('url' => './rename', 'name'=>'rename');
		$list[]=array('url' => './renamenx', 'name'=>'renamenx');
		$list[]=array('url' => './type', 'name'=>'type');
		$list[]=array('url' => './rd', 'name'=>'rd');
		$vars['list'] = $list;
		$this->load->view('redis/index',$vars);
	}
	public function type(){
		// 返回key所储存的值的类型。
		// 时间复杂度：
		// O(1)
		// 返回值：
		// none(key不存在) int(0)
		// string(字符串) int(1)
		// list(列表) int(3)
		// set(集合) int(2)
		// zset(有序集) int(4)
		// hash(哈希表) int(5)
		$redis = $this->rconn();
		//TYPE
		$redis->flushALL();
		echo '<br><br>TYPE<br>';
		var_dump($redis->TYPE('fake_key')); //none /int(0)
		$redis->SET('weather',"sunny");  # 构建一个字符串
		var_dump($redis->TYPE('weather'));//string / int(1)
		$redis->SADD('pat',"dog");  # 构建一个集合
		var_dump($redis->TYPE('pat')); //set /int(2)
		$redis->LPUSH('book_list',"programming in scala");  # 构建一个列表
		var_dump($redis->TYPE('book_list'));//list / int(3)
		$redis->ZADD('pats',1,'cat');  # 构建一个zset (sorted set) // int(1)
		$redis->ZADD('pats',2,'dog');
		$redis->ZADD('pats',3,'pig');
		var_dump($redis->zRange('pats',0,-1)); // array(3) { [0]=> string(3) "cat" [1]=> string(3) "dog" [2]=> string(3) "pig" }
		var_dump($redis->TYPE('pats')); //zset / int(4)
		$redis->HSET('website','google','www.g.cn');   # 一个新域
		var_dump($redis->HGET('website','google')); //string(8) "www.g.cn"
		var_dump($redis->TYPE('website')); //hash /int(5)
	}
	public function renamenx(){
		// RENAMENX key newkey
		// 当且仅当newkey不存在时，将key改为newkey。
		// 出错的情况和RENAME一样(key不存在时报错)。
		// 时间复杂度：
		// O(1)
		// 返回值：
		// 修改成功时，返回1。
		// 如果newkey已经存在，返回0。
		//RENAMENX
		echo '<br><br>RENAMENX<br>';
		# 情况1：newkey不存在，成功
		$redis->SET('player',"MPlyaer");
		$redis->EXISTS('best_player'); //int(0)
		var_dump($redis->RENAMENX('player','best_player')); // bool(true)
		# 情况2：newkey存在时，失败
		$redis->SET('animal',"bear");
		$redis->SET('favorite_animal', "butterfly");
		var_dump($redis->RENAMENX('animal', 'favorite_animal'));// bool(false)
		var_dump($redis->get('animal')); //string(4) "bear"
		var_dump($redis->get('favorite_animal')); //string(9) "butterfly"
	}
	public function rename(){
		// 将key改名为newkey。
		// 当key和newkey相同或者key不存在时，返回一个错误。
		// 当newkey已经存在时，RENAME命令将覆盖旧值。
		// 时间复杂度：
		// O(1)
		// 返回值：
		// 改名成功时提示OK，失败时候返回一个错误。
		$redis = $this->rconn();
		//RENAME
		echo '<br><br>RENAME<br>';
		# 情况1：key存在且newkey不存在
		$redis->SET('message',"hello world");
		var_dump($redis->RENAME('message','greeting'));  //bool(true)
		var_dump($redis->EXISTS('message'));  # message不复存在 //bool(false)
		var_dump($redis->EXISTS('greeting'));   # greeting取而代之 //bool(true)
		# 情况2：当key不存在时，返回错误 ,php返回false;
		var_dump($redis->RENAME('fake_key','never_exists'));  //bool(false)
		# 情况3：newkey已存在时，RENAME会覆盖旧newkey
		$redis->SET('pc',"lenovo");
		$redis->SET('personal_computer',"dell");
		var_dump($redis->RENAME('pc','personal_computer')); //bool(true)
		var_dump($redis->GET('pc')); //(nil)   bool(false)
		var_dump($redis->GET('personal_computer'));  # dell“没有”了 //string(6) "lenovo"
	}
	public function move(){
		// MOVE key db
		// 将当前数据库(默认为0)的key移动到给定的数据库db当中。
		// 如果当前数据库(源数据库)和给定数据库(目标数据库)有相同名字的给定key，或者key不存在于当前数据库，那么MOVE没有任何效果。
		// 因此，也可以利用这一特性，将MOVE当作锁(locking)原语。
		// 时间复杂度：
		// O(1)
		// 返回值：
		// 移动成功返回1，失败则返回0。
		$redis = $this->rconn();
		//MOVE
		echo '<br><br>MOVE<br>';
		# 情况1： key存在于当前数据库
		$redis->SELECT(0);  # redis默认使用数据库0，为了清晰起见，这里再显式指定一次。//OK
		$redis->SET('song',"secret base - Zone"); //OK
		var_dump ($redis->MOVE('song',1));  # 将song移动到数据库1 //bool(true)

		# 情况2：当key不存在的时候
		$redis->SELECT(1);
		var_dump ($redis->EXISTS('fake_key'));//bool(false);
		var_dump($redis->MOVE('fake_key', 0));  # 试图从数据库1移动一个不存在的key到数据库0，失败) //bool(false)

		$redis->SELECT(0); # 使用数据库0
		var_dump($redis->EXISTS('fake_key'));  # 证实fake_key不存在 //bool(false)
		# 情况3：当源数据库和目标数据库有相同的key时
		$redis->SELECT(0);  # 使用数据库0
		$redis->SET('favorite_fruit',"banana");
		$redis->SELECT(1);  # 使用数据库1
		$redis->SET('favorite_fruit',"apple");
		$redis->SELECT(0);  # 使用数据库0，并试图将favorite_fruit移动到数据库1
		var_dump($redis->MOVE('favorite_fruit',1));  # 因为两个数据库有相同的key，MOVE失败 //return bool(false)
		echo $redis->GET('favorite_fruit');  # 数据库0的favorite_fruit没变 //return banana
		$redis->SELECT(1);
		echo $redis->GET('favorite_fruit');   # 数据库1的favorite_fruit也是 //return apple
	}
	public function exists(){
		// 检查给定key是否存在。
		// 时间复杂度：
		// O(1)
		// 返回值：
		// 若key存在，返回1，否则返回0。
		$redis = $this->rconn();
		$redis->set('db','redis');//bool(true)
		var_dump($redis->exists('db'));# key存在 //bool(true)
		$redis->del('db'); # 删除key //int(1)
		var_dump($redis->exists('db'));# key不存在 //bool(false)
	}
	public function ttl(){
		// TTL key
		// 返回给定key的剩余生存时间(time to live)(以秒为单位)。
		// 时间复杂度：
		// O(1)
		// 返回值：
		// key的剩余生存时间(以秒为单位)。
		// 当key不存在或没有设置生存时间时，返回-1 。
		//TTL
		#  情况1：带TTL的key
		$redis = $this->rconn();
		$redis->flushdb();
		$redis->set('name','zhangtongchuan');
		$redis->expire('name',10); # 设置生存时间为10秒 //return (integer) 1
		var_dump($redis->ttl('name'));//return ikodota
		echo $redis->ttl('name');#int(10)
		echo date('h:i:s');
		// sleep(10);
		echo date('h:i:s');
		echo $redis->get('name');
		var_dump($redis->ttl('name'));

		#情况2：不带TTL的key
		$redis->set('site','wikipedia.org');//OK
		var_dump($redis->ttl('site'));//int(-1)

		# 情况3：不存在的key
		$redis->EXISTS('not_exists_key');//int(0)
	}
	public function randomkey(){
		// 从当前数据库中随机返回(不删除)一个key。
		// 时间复杂度：
		// O(1)
		// 返回值：
		// 当数据库不为空时，返回一个key。
		// 当数据库为空时，返回nil。

		$redis = $this->rconn();
		$redis->FLUSHALL();
		# 情况1：数据库不为空
		$array_mset_randomkey=array('fruit'=>'apple', 'drink'=>'beer','food'=>'cookis');
		$redis->mset($array_mset_randomkey);
		echo $redis->randomkey();
		print_r($redis->keys('*'));#Array ( [0] => food [1] => drink [2] => fruit )
		# 情况2：数据库为空
		$redis->flushdb();# 删除当前数据库所有key
		var_dump($redis->randomkey());
	}
	public function keys(){
		// KEYS pattern
		// 查找符合给定模式的key。
		// KEYS *命中数据库中所有key。
		// KEYS h?llo命中hello， hallo and hxllo等。
		// KEYS h*llo命中hllo和heeeeello等。
		// KEYS h[ae]llo命中hello和hallo，但不命中hillo。
		// 特殊符号用"\"隔开
		// 时间复杂度：
		// O(N)，N为数据库中key的数量。
		// 返回值：
		// 符合给定模式的key列表。
		// 警告 :KEYS的速度非常快，但在一个大的数据库中使用它仍然可能造成性能问题，如果你需要从一个数据集中查找特定的key，你最好还是用集合(Set)。
		$redis = $this->rconn();
		$array_mset_keys = array('one'=>1,'two'=>2,'three'=>3,'four'=>4,'five'=>5);
		$redis->mset($array_mset_keys);#用MSET一次储存多个值
		var_dump($redis->keys('*o*')); #array(5) {  [0]=>  string(4) "four"  [1]=>  string(13) "tutorial-list"  [2]=>  string(3) "one"  [3]=>  string(3) "two"  [4]=>  string(13) "tutorial-name"}
		echo json_encode($redis->keys('*o*')); #["four","tutorial-list","one","two","tutorial-name"]
		var_dump($redis->keys('t??')); #array(1) {  [0]=>  string(3) "two"}
		var_dump($redis->keys('t[w]*')); #array(1) {  [0]=>  string(3) "two"}
		var_dump($redis->keys('*'));#array(7) {  [0]=>  string(4) "four"  [1]=>  string(4) "five"  [2]=>  string(13) "tutorial-list"  [3]=>  string(3) "one"  [4]=>  string(3) "two"  [5]=>  string(13) "tutorial-name"  [6]=>  string(5) "three"}
	}
	public function del(){
		// 移除给定的一个或多个key。
		// 如果key不存在，则忽略该命令。
		// 时间复杂度：
		// O(N)，N为要移除的key的数量。
		// 移除单个字符串类型的key，时间复杂度为O(1)。
		// 移除单个列表、集合、有序集合或哈希表类型的key，时间复杂度为O(M)，M为以上数据结构内的元素数量。
		// 返回值：
		// 被移除key的数量。
		$redis = $this->rconn();
		# 情况1： 删除单个key
		$redis->set('myname','ikodota');
		echo $redis->get('myname'); #返回ikodota
		echo "==============";
		$redis->del('myname'); #返回TRUE(1)
		var_dump($redis->get('myname')); #返回bool(false)

		echo $redis->exists('fake_key');
		#情况2 删除一个不存在的key
		if(!$redis->exists('fake_key')){ #不存在
			var_dump($redis->del('fake_key')); #返回int(0)
		}

		#情况3：同时删除多个key
		$array_mset = array('first_key'=>'first_val','second_key'=>'second_val','third_key'=>'third_val');
		$redis->mset($array_mset); #用mset一次存储多个值
		$array_mget = array('first_key','second_key','third_key');
		var_dump($redis->mget($array_mget));#一次返回多个值 //array(3) { [0]=> string(9) "first_val" [1]=> string(10) "second_val" [2]=> string(9) "third_val" }

		$redis->del($array_mget);#同时删除多个key
		var_dump($redis->mget($array_mget)); #返回 array(3) { [0]=> bool(false) [1]=> bool(false) [2]=> bool(false) }
	}
	public function rd(){
		$redis = $this->rconn();
		echo json_encode($redis);
		foreach ($redis as $key => $value) {
			# code...
			var_dump($key);
		}
		exit();
	}
	public function rkeys(){
		$redis = $this->rconn();
		$arList = $redis->keys("*");
		var_dump($arList);
	}
	public function rlist(){
		// $redis = new Redis();
		// $redis->connect('127.0.0.1',6379);
		// echo "Connction to server sucessfully";
		$redis = $this->rconn();
		$redis->lpush('tutorial-list',"Redis");
		$redis->lpush('tutorial-list',"Mongodb");
		$redis->lpush('tutorial-list',"MySql");
		$arList = $redis->lrange("tutorial-list", 0 ,5);\
		var_dump($arList);
	}
	public function conn(){
		echo '<a href="./">返回</a>';
		$redis = new Redis();
		$redis->connect('127.0.0.1',6379);
		echo "Connection to server sucessfully";
		$redis->set('tutorial-name','Redis tutorial');
		echo "Stored string in redis:: ".$redis->get('tutorial-name');
		return $redis;
		exit();
	}
	public function rconn(){
		$redis = new Redis();
		$redis->connect('127.0.0.1',6379);
		return $redis;
	}
}
?>
